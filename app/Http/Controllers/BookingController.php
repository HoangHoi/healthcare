<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\BookingRequested;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;
use App\Models\Patient;
use App\Models\Request as BookingRequest;
use Carbon\Carbon;
use Exception;

class BookingController extends Controller
{
    const SERVICE_TYPES = [
        'bac-sy' => 'makeBookingWithDoctor',
        // 'chuyen-khoa' => 'makeBookingWithDoctor',
        // 'benh-vien' => 'makeBookingWithDoctor',
        // 'tu-van' => 'makeBooking',
    ];

    const SERVICE_CLASS = [
        'bac-sy' => Doctor::class,
        'benh-vien' => Hospital::class,
        'chuyen-khoa' => Specialist::class,
        'tu-van' => Doctor::class,
    ];

    public function index(Request $request)
    {
        $with = [];
        $type = $request->get('type', null);
        if ($type != null) {
            if (!array_key_exists($type, self::SERVICE_TYPES)) {
                return redirect()->route('booking.index');
            }
            $with = $this->{self::SERVICE_TYPES[$type]}($request);
            $with['type'] = $type;
        }
        $with['services'] = [
            'bac-sy' => 'Hẹn bác sỹ',
            'chuyen-khoa' => 'Chọn chuyên khoa khám',
            'benh-vien' => 'Hẹn khám ở bệnh viện',
            'tu-van' => 'Tư vấn tôi chọn bác sỹ',
        ];

        return view('pages.booking', $with);
    }

    protected function makeBookingWithDoctor(Request $request)
    {
        $with = [];
        $doctor = Doctor::with([
                'hospital' =>  function($query) {
                    $query->select(['id', 'name', 'address']);
                },
                'specialist' =>  function($query) {
                    $query->select(['id', 'name']);
                },
            ])->find((int) $request->get('doctor_id', 0));
        if ($doctor) {
            $with['serviceDetail'] = $this->makeDoctorHtmlDetail($doctor);
            $with['serviceId'] = $doctor->id;
            try {
                $dateTime = Carbon::parse($request->get('date_time', null));
                $time = $doctor->times()
                    ->where('day_of_week', '=', $dateTime->dayOfWeek)
                    ->whereTime('begin_time', '=', $dateTime->toTimeString())
                    ->first();
                if ($time) {
                    $with['date'] = $dateTime->format('d-m-Y');
                    $with['time'] = [
                        'list' => $doctor->times()
                                ->where('day_of_week', '=', $dateTime->dayOfWeek)
                                ->get()
                                ->mapWithKeys(function ($timeItem) {
                                    return [$timeItem->id => substr($timeItem['begin_time'], 11, 5)];
                                })
                                ->toArray(),
                        'selected' => $time->id,
                    ];
                }
            } catch (Exception $e) {
            }
        }

        return $with;
    }

    protected function makeDoctorHtmlDetail($doctor)
    {
        return view('components.doctor-detail', ['doctor' => $doctor->toArray()])->render();
    }

    public function store(Request $request)
    {
        $type = $request->get('type');
        $data = $request->all();
        switch ($data['type']) {
            case 'dat-cho-minh':
                $data['type_name'] = 'Đặt cho mình';
                break;
            case 'dat-cho-nguoi-than':
                $data['type_name'] = 'Đặt cho người thân';
                break;
            default:
                $data['type_name'] = 'Không xác định';
                break;
        }
        switch ($request->get('service_type')) {
            case 'bac-sy':
                $doctor = Doctor::find($request->get('service_id'));
                $data['service_type_name'] = 'Đặt bác sỹ';
                if ($doctor) {
                    $data['service_name'] = $doctor->name;
                } else {
                    $data['service_name'] = null;
                }
                $data['service_title_name'] = 'Bác sỹ';
                break;

            case 'chuyen-khoa':
                $data['service_type_name'] = 'Đặt chuyên khoa';
                $specialist = Specialist::find($request->get('service_id'));
                if ($specialist) {
                    $data['service_name'] = $specialist->name;
                } else {
                    $data['service_name'] = null;
                }
                $data['service_title_name'] = 'Chuyên khoa';
                break;

            case 'benh-vien':
                $data['service_type_name'] = 'Đặt bệnh viện';
                $hospital = Hospital::find($request->get('service_id'));
                if ($hospital) {
                    $data['service_name'] = $hospital->name;
                } else {
                    $data['service_name'] = null;
                }
                $data['service_title_name'] = 'Bệnh viện';
                break;

            case 'tu-van':
                $data['service_type_name'] = 'Tư vấn tôi';
                break;

            default:
                break;
        }

        Mail::to(env('MAIL_DEST'))->queue(new BookingRequested($data));
        $this->storeBookingRequest($data);
        return view('pages.booking-success', [
            'data' => $data,
        ]);
    }

    protected function storeBookingRequest(array $data)
    {
        try {
            $patientData = [
                'name' => $data['name'],
                'gender' => $data['gender'] == 'nam' ? 1 : 0,
                'year_of_birth' => $data['birthyear'],
                'description' => $data['description'],
            ];
            $newPatient = Patient::create($patientData);

            $bookingRequestData = [
                'patient_id' => $newPatient->id,
                'name' => isset($data['orderer_name']) ? $data['orderer_name'] : $data['name'],
                'email' => isset($data['orderer_email']) ? $data['orderer_email'] : $data['email'],
                'phone_number' => isset($data['orderer_phone_number']) ? $data['orderer_phone_number'] : $data['phone_number'],
                'address' => $data['address'],
                'date' => Carbon::createFromFormat('d-m-Y H:i', "{$data['date']} {$data['time']}")->toDateTimeString(),
                'status' => BookingRequest::PENDING,
                'entityable_id' => $data['service_id'],
                'entityable_type' => self::SERVICE_CLASS[$data['service_type']],
            ];
            $newBookingRequest = BookingRequest::create($bookingRequestData);
        } catch (Exception $e) {

        }
    }
}

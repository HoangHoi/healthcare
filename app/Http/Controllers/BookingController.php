<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\BookingRequested;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Specialist;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.booking');
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
        return view('pages.booking-success', [
            'data' => $data,
        ]);
    }
}

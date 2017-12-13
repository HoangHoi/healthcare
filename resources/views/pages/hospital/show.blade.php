@extends('layouts.master')

@section('content')
<div class="hospital">
    <div class="hospital-header">
        <span>Benh vien bach mai</span>
    </div>
    <div class="hospital-body">
        @if(count($doctors) <= 0)
            <div>Khong co bac sy de dat lich trong benh vien nay</div>
        @endif

        @foreach($doctors as $doctor)
            <div class="panel panel-default content">
                <div class="panel-body body-content">
                    <div class="content-item">
                        <div class="item">
                            <div class="item-image">
                                <div class="image" style="background-image: url('{!! $doctor['avatar'] !!}');"></div>
                            </div>
                            <div class="item-detail">
                                <div class="name">
                                    <a>Bác sỹ {!! $doctor['name'] !!}</a>
                                </div>
                                <div class="description">
                                    <span style="font-weight: 900">Bác sỹ khám chuyên khoa {!! $doctor['specialist']['name'] !!}</span>
                                    <br/>
                                    <span style="font-weight: 900">Bệnh Viện {!! $doctor['hospital']['name'] !!}</span>
                                    <br/>
                                    <span>{!! $doctor['info'] !!}</span>
                                    <br/>
                                    <span>Ha Noi</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule">
                            <div class="schedule-title">
                                <span>Dat lich kham</span>
                                <select name="date" class="date" data-schedule="doctor-{!! $doctor['id'] !!}">
                                    @foreach($doctor['times'] as $day => $time)
                                        <option data-items='{!! $time['times_json'] !!}' class="schedule-date">{!! $day !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="schedule-detail">
                                @if(count($doctor['times']) > 0)
                                    <ul id="doctor-{!! $doctor['id'] !!}">
                                        @foreach(array_values($doctor['times'])[0]['times'] as $time)
                                            <li><a href="{!! $time['link'] !!}">{!! $time['time'] !!}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div><span>Khong co lich hom nay</span></div>
                                @endif

                                <div class="noty">
                                    <span><i class="fa fa-hand-o-up" aria-hidden="true"></i> Chon va dat lich mien phi</span>
                                </div>
                                <div class="price">Gia kham: <span>200.000<sup>d</sup></span></div>
                                {{-- <div class="insurance">Loai bao hiem ap dung. <a href="#">Xem chi tiet</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>var appUrl = "{!! env('APP_URL') !!}"</script>
    <script src="{!! mix('js/hospital.js') !!}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

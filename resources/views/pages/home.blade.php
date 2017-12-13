@extends('layouts.master')

@section('content')
@include('includes.filter-tool-bar')

<div class="doctors-list">
    @if(count($doctors) <= 0)
        <div>Khong co bac sy de dat lich</div>
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
                                <span>Hà Nội</span>
                            </div>
                        </div>
                    </div>

                    <div class="schedule">
                        <div class="schedule-title">
                            <span>Đặt lịch khám</span>
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
                                <div><span>Không có lịch hôm nay</span></div>
                            @endif

                            <div class="noty">
                                <span><i class="fa fa-hand-o-up" aria-hidden="true"></i> Chọn và đặt lịch miễn phí</span>
                            </div>
                            <div class="price">Giá khám: <span>{!! number_format($doctor['examination_fee'], 0, ',', '.') !!}<sup>đ</sup></span></div>
                            {{-- <div class="insurance">Loại bảo hiểm áp dụng. <a href="#">Xem chi tiet</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

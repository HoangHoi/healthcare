@extends('layouts.booking')

@section('content')
<div class="panel panel-default">
    <div class="panel-body booking">
        <div class="booking-title">
            <span>Đặt lịch khám bác sỹ chuyên khoa</span>
        </div>
        <div class="booking-body">
            <div class="select-service">
                <div class="title">
                    <span>Chọn dịch vụ</span>
                </div>
                <select id="select-service" class="select-box">
                    @foreach($services as $serviceValue => $serviceName)
                        <option value="{!! $serviceValue !!}" {!! isset($type) && $type == $serviceValue ? 'selected' : '' !!}>
                            <span>{!! $serviceName !!}</span>
                        </option>
                    @endforeach
                    {{-- <option value="chuyen-khoa">
                        <span>Chọn chuyên khoa khám</span>
                    </option>
                    <option value="benh-vien">
                        <span>Hẹn khám ở bệnh viện</span>
                    </option>
                    <option value="tu-van">
                        <span>Tư vấn tôi chọn bác sỹ</span>
                    </option> --}}
                </select>
            </div>
            <div class="search-group active" id="chon-bac-sy">
                <label class="search-title" for="search-input">Chọn bác sỹ</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-bac-sy" placeholder="Nhập tên bác sỹ để tìm kiếm">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="bac-sy-goi-y" class="result-list">
                            <div style="background-color: rgba(250, 251, 254, 1); display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px">Click vào ô nhập liệu để tìm kiếm...</div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="search-group" id="chon-chuyen-khoa">
                <label class="search-title" for="search-input">Chọn chuyên khoa</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-chuyen-khoa" placeholder="Nhập tên chuyên khoa để tìm kiếm">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="chuyen-khoa-goi-y" class="result-list">
                           <div style="background-color: rgba(250, 251, 254, 1); display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px">Click vào ô nhập liệu để tìm kiếm...</div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="search-group" id="chon-benh-vien">
                <label class="search-title" for="search-input">Chọn bệnh viện</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-benh-vien" placeholder="Nhập tên bệnh viện để tìm kiếm">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="benh-vien-goi-y" class="result-list">
                           <div style="background-color: rgba(250, 251, 254, 1); display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px">Click vào ô nhập liệu để tìm kiếm...</div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="error" id="error" style="margin: 10px 0; display: none;">
                <span style="color: red" id="error-message"></span>
            </div>

            <div class="service-detail" id="service-detail">
                {!! $serviceDetail or '' !!}
            </div>

            <div class="date-time-select">
                <div class="date-select">
                    <label for="date">Ngày khám</label>
                    <input type="text" class="form-control datepicker" name="date" id="date" placeholder="29-10-2017" value="{!! $date or '' !!}">
                </div>
                <div class="time-select" id="time-select" {!! isset($time) ? 'style="display: flex;"' : 'style="display: none;"' !!}>
                    <label for="time">Giờ khám</label>
                    <select class="form-control" id="time" name="time">
                        @if(isset($time))
                            @foreach($time['list'] as $key => $value)
                                <option value="{!! $value !!}" {!! $time['selected'] == $key ? 'selected' : '' !!}>{!! $value !!}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="full input-info">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#select1">Đặt cho mình</a></li>
                    <li><a data-toggle="tab" href="#select2">Đặt cho người thân</a></li>
                </ul>
                <div class="tab-content">
                    <div id="select1" class="tab-pane fade in active">
                        <form action="{!! route('booking.store') !!}" method="POST" class="booking-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="dat-cho-minh"/>
                            <input type="hidden" name="service_type" class="service-type" value="{!! $type or 'bac-sy' !!}"/>
                            <input type="hidden" name="service_id" class="service-id" value="{!! $serviceId or '' !!}"/>
                            <input type="hidden" name="date" class="date" value="{!! $date or '' !!}"/>
                            <input type="hidden" name="time" class="time" value="{!! isset($time) ? $time['list'][$time['selected']] : '' !!}"/>
                            <div class="h-input-group">
                                <input type="text" name="name" class="h-form-control" placeholder="Họ và tên bệnh nhân (bắt buộc)" aria-describedby="name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <div class="h-form-check-inline">
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" id="nam" value="nam" checked="checked"> Nam
                                    </label>
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" id="nu" value="nu"> Nữ
                                    </label>
                                </div>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Số điện thoại liên hệ (bắt buộc)" aria-describedby="phone-number" name="phone_number" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Địa chỉ email (nếu có)" aria-describedby="email" name="email">
                                <span class="h-input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Năm sinh (bắt buộc)" aria-describedby="birthyear" name="birthyear" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Địa chỉ" aria-describedby="address" name="address">
                                <span class="h-input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" rows="3" placeholder="Lý do khám, triệu chứng gặp phải" name="description"></textarea>
                                <span class="h-input-group-addon"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <div style="margin: 10px 0"><span>Chúng tôi sẽ liên hệ với bạn ngay sau khi bạn đặt lịch.</span></div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Đặt lịch ngay</button>
                        </form>
                    </div>
                    <div id="select2" class="tab-pane fade">
                        <form action="{!! route('booking.store') !!}" method="POST" class="booking-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="dat-cho-nguoi-than"/>
                            <input type="hidden" name="service_type" class="service-type" value="{!! $type or 'bac-sy' !!}"/>
                            <input type="hidden" name="service_id" class="service-id" value="{!! $serviceId or '' !!}"/>
                            <input type="hidden" name="date" class="date" value="{!! $date or '' !!}"/>
                            <input type="hidden" name="time" class="time" value="{!! isset($time) ? $time['list'][$time['selected']] : '' !!}"/>
                            <div style="color: #4168ae; font-weight: 900; margin: 5px 0;">
                                <span>Thông tin người đặt lịch</span>
                            </div>

                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Họ và tên người đặt (bắt buộc)" aria-describedby="name" name="orderer_name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Số điện thoại liên hệ (bắt buộc)" aria-describedby="phone-number" name="orderer_phone_number" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Địa chỉ email (nếu có)" aria-describedby="email" name="orderer_email">
                                <span class="h-input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>

                            <div style="color: #4168ae; font-weight: 900; margin: 5px 0;">
                                <span>Thông tin bệnh nhân</span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Họ và tên bệnh nhân (bắt buộc)" aria-describedby="name" name="name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <div class="h-form-check-inline">
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" value="nam" checked="checked"> Nam
                                    </label>
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" value="nu"> Nữ
                                    </label>
                                </div>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Số điện thoại bệnh nhân" aria-describedby="phone-number" name="phone_number">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Năm sinh (bắt buộc)" aria-describedby="birthyear" name="birthyear" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Dia chi" aria-describedby="address" name="address">
                                <span class="h-input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lý do khám, triệu chứng gặp phải" name="description"></textarea>
                                <span class="h-input-group-addon"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <div style="margin: 10px 0"><span>Chúng tôi sẽ liên hệ với bạn ngay sau khi bạn đặt lịch.</span></div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Đặt lịch ngay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>var appUrl = "{!! env('APP_URL') !!}"</script>
    <script src="{!! mix('js/booking.js') !!}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

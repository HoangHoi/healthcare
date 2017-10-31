@extends('layouts.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body booking">
        <div class="booking-title">
            <span>Dat lich kham bac sy chuyen khoa</span>
        </div>
        <div class="booking-body">
            <div class="select-service">
                <div class="title">
                    <span>Chon dich vu</span>
                </div>
                <select id="select-service" class="select-box">
                    <option value="bac-sy">
                        <span>Hen bac sy</span>
                    </option>
                    <option value="chuyen-khoa">
                        <span>Chon chuyen khoa kham</span>
                    </option>
                    <option value="benh-vien">
                        <span>Hen kham o benh vien</span>
                    </option>
                    <option value="tu-van">
                        <span>Tu van toi chon bac sy</span>
                    </option>
                </select>
            </div>
            <div class="search-group active" id="chon-bac-sy">
                <label class="search-title" for="search-input">Chon bac sy</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-bac-sy" placeholder="Nhap ten bac sy de tim kiem">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="bac-sy-goi-y" class="result-list">
                           <li>
                               <div class="item-title">Bac sy Hoang Huu Hoi</div>
                               <div class="item-body">
                                   <span>Bac sy chuyen khoa - benh vien bach mai</span>
                               </div>
                           </li>
                           <li>
                               <div class="item-title">Bac sy Hoang Huu Hoi</div>
                               <div class="item-body">
                                   <span>Bac sy chuyen khoa - benh vien bach mai</span>
                               </div>
                           </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="search-group" id="chon-chuyen-khoa">
                <label class="search-title" for="search-input">Chon chuyen khoa</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-chuyen-khoa" placeholder="Nhap ten chuyen khoa de tim kiem">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="chuyen-khoa-goi-y" class="result-list">
                           <li>
                               <div class="item-title">Chuyen khoa Noi</div>
                               <div class="item-body">
                                   <span>Chuyen kham cac benh duong ruot, tim, gan</span>
                               </div>
                           </li>
                           <li>
                               <div class="item-title">Chuyen khoa ngoai</div>
                               <div class="item-body">
                                   <span>Chuyen tri cac benh ngoai da</span>
                               </div>
                           </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="search-group" id="chon-benh-vien">
                <label class="search-title" for="search-input">Chon benh vien</label>
                <div class="search-input">
                    <input type="text" class="form-control" id="tim-benh-vien" placeholder="Nhap ten benh vien de tim kiem">
                    <div class="search-result" id="bac-sy-search-result">
                        <ul id="benh-vien-goi-y" class="result-list">
                           <li>
                               <div class="item-title">Benh Vien Bach Mai</div>
                               <div class="item-body">
                                   <span>Benh vien uy tin nhat Ha Noi</span>
                               </div>
                           </li>
                           <li>
                               <div class="item-title">Benh Vien Hong Ngoc</div>
                               <div class="item-body">
                                   <span>Benh vien tu nhan uy tin nhat</span>
                               </div>
                           </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="error" id="error" style="margin: 10px 0; display: none;">
                <span style="color: red" id="error-message"></span>
            </div>

            <div class="service-detail" id="service-detail">
                <div class="service-picture">
                    <div class="picture" style="background-image: url('images/doctors/bacsy.jpg');"></div>
                </div>
                <div class="description">
                    <div class="title">
                        <span>Bac sy Hoang Huu Hoi</span>
                    </div>
                    <div class="info">
                        <span>Bác sỹ khám chuyên khoa Cơ Xương Khớp Nguyên trưởng khoa Cơ - Xương - Khớp Bệnh Viện Bạch Mai</span>
                    </div>
                </div>
            </div>

            <div class="time-select">
                <div class="date-select">
                    <label for="date">Ngay kham</label>
                    <input type="text" class="form-control datepicker" id="date-select" placeholder="29-10-2017">
                </div>
                <div class="time-select">
                    <label for="date">Gio kham</label>
                    <input type="text" class="form-control" id="date" placeholder="09:30">
                </div>
            </div>

            <div class="full input-info">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#select1">Dat cho minh</a></li>
                    <li><a data-toggle="tab" href="#select2">Dat cho nguoi than</a></li>
                </ul>
                <div class="tab-content">
                    <div id="select1" class="tab-pane fade in active">
                        <form action="{!! route('booking.store') !!}" method="POST" class="booking-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="dat-cho-minh"/>
                            <input type="hidden" name="service_type" class="service-type" value="bac-sy"/>
                            <input type="hidden" name="service_id" class="service-id" value=""/>
                            <input type="hidden" name="date" class="date" value=""/>
                            <div class="h-input-group">
                                <input type="text" name="name" class="h-form-control" placeholder="Ho va ten benh nhan (bat buoc)" aria-describedby="name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <div class="h-form-check-inline">
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" id="nam" value="nam" checked="checked"> Nam
                                    </label>
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="gender" id="nu" value="nu"> Nu
                                    </label>
                                </div>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="So dien thoai lien he (bat buoc)" aria-describedby="phone-number" name="phone_number" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Dia chi email" aria-describedby="email" name="email">
                                <span class="h-input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Nam sinh (bat buoc)" aria-describedby="birthyear" name="birthyear" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Dia chi" aria-describedby="address" name="address">
                                <span class="h-input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" rows="3" placeholder="Ly do kham, trieu chung gap phai" name="description"></textarea>
                                <span class="h-input-group-addon"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Dat lich ngay</button>
                        </form>
                    </div>
                    <div id="select2" class="tab-pane fade">
                        <form action="{!! route('booking.store') !!}" method="POST" class="booking-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="dat-cho-nguoi-than"/>
                            <input type="hidden" name="service_type" class="service-type" value="bac-sy"/>
                            <input type="hidden" name="service_id" class="service-id" value=""/>
                            <input type="hidden" name="date" class="date" value=""/>
                            <div style="color: #4168ae; font-weight: 900; margin: 5px 0;">
                                <span>Thong tin nguoi dat lich</span>
                            </div>

                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Ho va ten nguoi dat (bat buoc)" aria-describedby="name" name="orderer_name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="So dien thoai lien he (bat buoc)" aria-describedby="phone-number" name="orderer_phone_number" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Dia chi email" aria-describedby="email" name="orderer_email">
                                <span class="h-input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>

                            <div style="color: #4168ae; font-weight: 900; margin: 5px 0;">
                                <span>Thong tin benh nhan</span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Ho va ten benh nhan (bat buoc)" aria-describedby="name" name="name" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="So dien thoai benh nhan" aria-describedby="phone-number" name="phone_number">
                                <span class="h-input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Nam sinh (bat buoc)" aria-describedby="birthyear" name="birthyear" required="required">
                                <span class="h-input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Dia chi" aria-describedby="address" name="address">
                                <span class="h-input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ly do kham, trieu chung gap phai" name="description"></textarea>
                                <span class="h-input-group-addon"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Dat lich ngay</button>
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

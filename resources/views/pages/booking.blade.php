@extends('layouts.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body booking">
        <div class="booking-title">
            <span>Dat lich kham</span>
        </div>
        <div class="booking-body">
            <div class="form-group">
                <label for="bacsy">Tim bac sy hoac Dich vu</label>
                <input type="email" class="form-control" id="bacsy" placeholder="Nhap bac sy hoac dich vu">
            </div>
            <div class="service-detail">
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
            <div class="form-group">
                <label for="date">Ngay kham</label>
                <input type="email" class="form-control" id="date" placeholder="Ngay kham">
            </div>
            <div class="form-group">
                <label for="date">Gio kham</label>
                <input type="email" class="form-control" id="date" placeholder="Gio kham">
            </div>

            <div class="full input-info">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#select1">Dat cho minh</a></li>
                    <li><a data-toggle="tab" href="#select2">Dat cho nguoi than</a></li>
                </ul>
                <div class="tab-content">
                    <div id="select1" class="tab-pane fade in active">
                        <form>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Ho va ten benh nhan (bat buoc)" aria-describedby="name">
                                <span class="h-input-group-addon" id="name"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <div class="h-form-check-inline">
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="inlineRadioOptions" id="nam" value="nam"> Nam
                                    </label>
                                    <label>
                                        <input class="h-form-check-input" type="radio" name="inlineRadioOptions" id="nu" value="nu"> Nu
                                    </label>
                                </div>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="So dien thoai lien he (bat buoc)" aria-describedby="phone-number">
                                <span class="h-input-group-addon" id="phone-number"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Dia chi email" aria-describedby="email">
                                <span class="h-input-group-addon" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Nam sinh (bat buoc)" aria-describedby="birthyear">
                                <span class="h-input-group-addon" id="birthyear"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Dia chi" aria-describedby="address">
                                <span class="h-input-group-addon" id="address"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ly do kham"></textarea>
                                <span class="h-input-group-addon" id="description"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Dat lich ngay</button>
                        </form>
                    </div>
                    <div id="select2" class="tab-pane fade">
                        <form>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Ho va ten benh nhan (bat buoc)" aria-describedby="name">
                                <span class="h-input-group-addon" id="name"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="So dien thoai lien he (bat buoc)" aria-describedby="phone-number">
                                <span class="h-input-group-addon" id="phone-number"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="email" class="h-form-control" placeholder="Dia chi email" aria-describedby="email">
                                <span class="h-input-group-addon" id="email"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="number" class="h-form-control" placeholder="Nam sinh (bat buoc)" aria-describedby="birthyear">
                                <span class="h-input-group-addon" id="birthyear"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <input type="text" class="h-form-control" placeholder="Dia chi" aria-describedby="address">
                                <span class="h-input-group-addon" id="address"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                            <div class="h-input-group">
                                <textarea class="h-form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ly do kham"></textarea>
                                <span class="h-input-group-addon" id="description"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
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

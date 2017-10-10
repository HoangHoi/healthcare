@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body body-content">
                    <div class="left-menu">
                        <div class="menu-title">
                            Chuyen khoa
                        </div>
                        <ul class="menu-body">
                            <li class="active">
                                <a>Khoa than kinh</a>
                            </li>
                            <li>
                                <a>Khoa ruot</a>
                            </li>
                            <li>
                                <a>Khoa mat</a>
                            </li>
                            <li>
                                <a>Khoa rang - ham - mat</a>
                            </li>
                            <li>
                                <a>Khoa than kinh</a>
                            </li>
                        </ul>
                    </div>

                    <div class="left-menu">
                        <div class="menu-title">
                            Benh vien
                        </div>
                        <ul class="menu-body">
                            <li class="active">
                                <a>Benh vien bach mai</a>
                            </li>
                            <li>
                                <a>Benh vien da lieu</a>
                            </li>
                            <li>
                                <a>Benh vien mat</a>
                            </li>
                            <li>
                                <a>Benh vien 108</a>
                            </li>
                            <li>
                                <a>Nha thuoc Dinh Cong</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-8 col-xs-12">

            <div class="panel panel-default content">
                <div class="panel-body body-content">
                    <div class="content-item">
                        <div class="item">
                            <div class="item-image">
                                <div class="image" style="background-image: url('images/doctors/bacsy.jpg');"></div>
                            </div>
                            <div class="item-detail">
                                <div class="name">
                                    <a href="#">Bac Sy Hoang Huu Hoi</a>
                                </div>
                                <div class="description">
                                    <span>Bác sỹ khám chuyên khoa Cơ Xương Khớp Nguyên trưởng khoa Cơ - Xương - Khớp Bệnh Viện Bạch Mai</span>
                                    <br/>
                                    <span>Ha Noi</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule">
                            <div class="schedule-title">
                                <span>Dat lich kham</span>
                                <select name="date" class="date">
                                    <option>Thu 4 - 02/09</option>
                                    <option>Thu 5 - 03/09</option>
                                    <option>Thu 6 - 04/09</option>
                                    <option>Thu 7 - 05/09</option>
                                </select>
                            </div>
                            <div class="schedule-detail">
                                <ul>
                                    <li><a href="">09:30</a></li>
                                    <li><a href="">10:00</a></li>
                                    <li><a href="">10:30</a></li>
                                    <li><a href="">11:00</a></li>
                                    <li><a href="">11:30</a></li>
                                    <li><a href="">13:30</a></li>
                                    <li><a href="">14:00</a></li>
                                    <li><a href="">14:30</a></li>
                                    <li><a href="">15:00</a></li>
                                    <li><a href="">15:30</a></li>
                                    <li><a href="">16:30</a></li>
                                </ul>
                                <div class="noty">
                                    <span><i class="fa fa-hand-o-up" aria-hidden="true"></i> Chon va dat lich mien phi</span>
                                </div>
                                <div class="price">Gia kham: <span>200.000<sup>d</sup></span></div>
                                <div class="insurance">Loai bao hiem ap dung. <a href="#">Xem chi tiet</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default content">
                <div class="panel-body body-content">
                    <div class="content-item">
                        <div class="item">
                            <div class="item-image">
                                <div class="image" style="background-image: url('images/doctors/bacsy.jpg');"></div>
                            </div>
                            <div class="item-detail">
                                <div class="name">
                                    <a href="#">Bac Sy Hoang Huu Hoi</a>
                                </div>
                                <div class="description">
                                    <span>Bác sỹ khám chuyên khoa Cơ Xương Khớp Nguyên trưởng khoa Cơ - Xương - Khớp Bệnh Viện Bạch Mai</span>
                                    <br/>
                                    <span>Ha Noi</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule">
                            <div class="schedule-title">
                                <span>Dat lich kham</span>
                                <select name="date" class="date">
                                    <option>Thu 4 - 02/09</option>
                                    <option>Thu 5 - 03/09</option>
                                    <option>Thu 6 - 04/09</option>
                                    <option>Thu 7 - 05/09</option>
                                </select>
                            </div>
                            <div class="schedule-detail">
                                <ul>
                                    <li><a href="">09:30</a></li>
                                    <li><a href="">10:00</a></li>
                                    <li><a href="">10:30</a></li>
                                    <li><a href="">11:00</a></li>
                                    <li><a href="">11:30</a></li>
                                    <li><a href="">13:30</a></li>
                                    <li><a href="">14:00</a></li>
                                    <li><a href="">14:30</a></li>
                                    <li><a href="">15:00</a></li>
                                    <li><a href="">15:30</a></li>
                                    <li><a href="">16:30</a></li>
                                </ul>
                                <div class="noty">
                                    <span><i class="fa fa-hand-o-up" aria-hidden="true"></i> Chon va dat lich mien phi</span>
                                </div>
                                <div class="price">Gia kham: <span>200.000<sup>d</sup></span></div>
                                <div class="insurance">Loai bao hiem ap dung. <a href="#">Xem chi tiet</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel panel-default content">
                <div class="panel-body body-content">
                    <div class="content-item">
                        <div class="item">
                            <div class="item-image">
                                <div class="image" style="background-image: url('images/doctors/bacsy.jpg');"></div>
                            </div>
                            <div class="item-detail">
                                <div class="name">
                                    <a href="#">Bac Sy Hoang Huu Hoi</a>
                                </div>
                                <div class="description">
                                    <span>Bác sỹ khám chuyên khoa Cơ Xương Khớp Nguyên trưởng khoa Cơ - Xương - Khớp Bệnh Viện Bạch Mai</span>
                                    <br/>
                                    <span>Ha Noi</span>
                                </div>
                            </div>
                        </div>

                        <div class="schedule">
                            <div class="schedule-title">
                                <span>Dat lich kham</span>
                                <select name="date" class="date">
                                    <option>Thu 4 - 02/09</option>
                                    <option>Thu 5 - 03/09</option>
                                    <option>Thu 6 - 04/09</option>
                                    <option>Thu 7 - 05/09</option>
                                </select>
                            </div>
                            <div class="schedule-detail">
                                <ul>
                                    <li><a href="">09:30</a></li>
                                    <li><a href="">10:00</a></li>
                                    <li><a href="">10:30</a></li>
                                    <li><a href="">11:00</a></li>
                                    <li><a href="">11:30</a></li>
                                    <li><a href="">13:30</a></li>
                                    <li><a href="">14:00</a></li>
                                    <li><a href="">14:30</a></li>
                                    <li><a href="">15:00</a></li>
                                    <li><a href="">15:30</a></li>
                                    <li><a href="">16:30</a></li>
                                </ul>
                                <div class="noty">
                                    <span><i class="fa fa-hand-o-up" aria-hidden="true"></i> Chon va dat lich mien phi</span>
                                </div>
                                <div class="price">Gia kham: <span>200.000<sup>d</sup></span></div>
                                <div class="insurance">Loai bao hiem ap dung. <a href="#">Xem chi tiet</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="right-menu">
                        <div class="menu-title">Bai viet noi bat</div>
                        <ul class="menu-body">
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-menu">
                        <div class="menu-title">Bai viet moi</div>
                        <ul class="menu-body">
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                            <li>
                                <a href="#">Bai viet 1 bai viet 2</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-menu">
                        <div class="menu-title">Phan hoi gan day</div>
                        <ul class="menu-body">
                            <li>
                                <a href="#">Phan hoi 1 phan hoi 2</a>
                            </li>
                            <li>
                                <a href="#">Phan hoi 1 phan hoi 2</a>
                            </li>
                            <li>
                                <a href="#">Phan hoi 1 phan hoi 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

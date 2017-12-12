@extends('layouts.master')

@section('content')
<div class="panel panel-default content">
    <div class="panel-body body-content">
        <div class="content-item">
            <div class="item">
                <div class="item-image">
                    <div class="image" style="background-image: url('images/doctors/bacsy.jpg');"></div>
                </div>
                <div class="item-detail">
                    <div class="name">
                        <a>Bac Sy Hoang Huu Hoi</a>
                    </div>
                    <div class="description">
                        <span>Bác sỹ khám chuyên khoa Cơ Xương Khớp Nguyên trưởng khoa Cơ - Xương - Khớp Bệnh Viện Bạch Mai</span>
                        <br/>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ha Noi</span>
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
                    {{-- <div class="insurance">Loai bao hiem ap dung. <a href="#">Xem chi tiet</a></div> --}}
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

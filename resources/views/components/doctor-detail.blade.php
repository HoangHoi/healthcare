<div class="service-picture">
    <div class="picture" style="background-image: url('{!! $doctor['avatar'] !!}');"></div>
</div>
<div class="description">
    <div class="title"><span>{!! $doctor['name'] !!}</span></div>
    <div class="info">
    <span>
        Chuyên khoa: {!! $doctor['specialist'] ? $doctor['specialist']['name'] : '' !!}<br>
        Bệnh viện: {!! $doctor['hospital'] ? $doctor['hospital']['name'] : '' !!}<br>
        Địa chỉ: {!! $doctor['hospital'] ? $doctor['hospital']['address'] : '' !!}<br>
        <span style="color: red; font-weight: 900">Giá khám: {!! number_format($doctor['examination_fee'], 0, ',', '.') !!} đồng</span><br>
        {!! $doctor['info'] !!}
    </span>
    </div>
</div>

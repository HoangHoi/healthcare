<div id="mail">
    <div><span style="font-weight: 900;">Kiểu đặt:</span> <span style="color: blue">{!! $data['type_name'] !!}</span></div>
    <div><span style="font-weight: 900;">Dịch vụ:</span> <span style="color: blue">{!! $data['service_type_name'] !!}</span></div>
    @if ($data['service_type'] != 'tu-van')
        <div><span style="font-weight: 900;">{!! $data['service_title_name'] !!}:</span> <span style="color: blue">{!! $data['service_name'] !!}</span></div>
    @endif
    <div><span style="font-weight: 900;">Ngày khám:</span> <span style="color: blue">{!! $data['date'] !!}</span></div>
    <div><span style="font-weight: 900;">Giờ khám:</span> <span style="color: blue">{!! $data['time'] !!}</span></div>
    <div style="margin-top: 15px; font-size: 1.3em; font-weight: 900">Thông tin người đặt</div>
    @if($data['type'] == 'dat-cho-minh')
        <div><span style="font-weight: 900;">Tên:</span> <span style="color: blue">{!! $data['name'] !!}</span></div>
        <div><span style="font-weight: 900;">Số điện thoại liên hệ:</span> <span style="color: blue">{!! $data['phone_number'] !!}</span></div>
        <div><span style="font-weight: 900;">Email:</span> <span style="color: blue">{!! $data['email'] !!}</span></div>
    @else
        <div><span style="font-weight: 900;">Tên:</span> <span style="color: blue">{!! $data['orderer_name'] !!}</span></div>
        <div><span style="font-weight: 900;">Số điện thoại liên hệ:</span> <span style="color: blue">{!! $data['orderer_phone_number'] !!}</span></div>
        <div><span style="font-weight: 900;">Email:</span> <span style="color: blue">{!! $data['orderer_email'] !!}</span></div>
    @endif

    <div style="margin-top: 15px; font-size: 1.3em; font-weight: 900">Thông tin bệnh nhân</div>
    <div><span style="font-weight: 900;">Tên bệnh nhân:</span> <span style="color: blue">{!! $data['name'] !!}</span></div>
    <div><span style="font-weight: 900;">Giới tính:</span> <span style="color: blue">{!! $data['gender'] !!}</span></div>
    <div><span style="font-weight: 900;">Năm sinh:</span> <span style="color: blue">{!! $data['birthyear'] !!}</span></div>
    <div><span style="font-weight: 900;">Địa chỉ:</span> <span style="color: blue">{!! $data['address'] !!}</span></div>
    <div><span style="font-weight: 900;">Lý do khám:</span> <span style="color: blue">{!! $data['description'] !!}</span></div>
</div>

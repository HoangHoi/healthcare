@extends('layouts.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-body booking" style="min-height: 300px; margin-top: 15px;">
        <div style="font-weight: 900; font-size: 20px; color: green;">
            <i class="fa fa-check" aria-hidden="true"></i><span> Đặt lịch khám thành công</span>
        </div>
        <div style="font-size: 16px;">
            <span>Cảm ơn bạn đã chọn dịch vụ của chúng tôi. Chúng tôi sẽ gọi điện thoại cho bạn sau 5 phút để xác nhận, cung cấp thông tin chi tiết lịch khám và tư vấn cho bạn.</span>
        </div>
        <div style="margin: 20px; padding: 20px; border: solid;">
            <div style="border-bottom: 1px solid; margin-bottom: 10px; font-size: 20px; font-weight: 900; display: flex; justify-content: center;">
                <span>Thông tin đặt lịch khám của bạn</span>
            </div>
            @include('mails.booking-requested')
        </div>
    </div>
</div>
@endsection

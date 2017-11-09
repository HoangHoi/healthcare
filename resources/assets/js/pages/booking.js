let data = [];

function resetData() {
    $('#service-detail').html('');
    $('.result-list').html('');
    $('#error').css('display', 'none');
    $('.service-id').val('');
}

$('#select-service').on('change', (event) => {
    let element = event.target;
    if (element.value != 'tu-van') {
        $('#service-detail').css('display', 'flex');
        $('.search-group.active').removeClass('active');
        $('#chon-' + element.value).addClass('active');
    } else {
        $('.search-group.active').removeClass('active');
        $('#service-detail').css('display', 'none');
    }
    $('.service-type').val(element.value);
    resetData();
});

let pictureElement = '<div class="service-picture">'
    + '<div class="picture" style="background-image: url(\':image_url:\');"></div>'
    + '</div>';
let descriptionElement = '<div class="description">'
    + '<div class="title">'
    + '    <span>:name:</span>'
    + '</div>'
    + '<div class="info">'
    + '    <span>:info:</span>'
    + '</div>'
    + '</div>';

$('.result-list').on('click', 'li', function (event) {
    let element = $(event.currentTarget);
    let itemData = data[element.data('index')];
    let type = element.data('type');
    let serviceDetailHtml = '';
    let image = '';
    let info = '';
    switch (type) {
        case 'bac-sy':
            image = pictureElement;
            image = image.replace(':image_url:', itemData.avatar);
            serviceDetailHtml += image;
            info = descriptionElement;
            let infoString = '';
            if (itemData.specialist != null) {
                infoString += 'Chuyên khoa: ' + itemData.specialist.name;
                infoString += '<br/>';
            }
            if (itemData.hospital != null) {
                infoString += 'Bệnh viện: ' + itemData.hospital.name;
                infoString += '<br/>';
                infoString += 'Địa chỉ: ' + itemData.hospital.address;
            }
            infoString += '<br/>';
            infoString += '<span style="color: red; font-weight: 900">Giá khám: ' + numberWithCommas(itemData.examination_fee) + ' đồng</span>';
            infoString += '<br/>';
            infoString += itemData.info;
            info = info.replace(':name:', itemData.name);
            info = info.replace(':info:', infoString);
            serviceDetailHtml += info;
        break;
        case 'benh-vien':
            image = pictureElement;
            image = image.replace(':image_url:', itemData.image);
            serviceDetailHtml += image;
            info = descriptionElement;
            info = info.replace(':name:', itemData.name);
            info = info.replace(':info:', 'Địa chỉ: ' + itemData.address + '<br/>' + itemData.description);
            serviceDetailHtml += info;
        break;
        case 'chuyen-khoa':
            info = descriptionElement;
            info = info.replace(':name:', itemData.name);
            info = info.replace(':info:', itemData.description);
            serviceDetailHtml += info;
        break;
    }
    $('.service-id').val(itemData.id);
    $('#service-detail').html(serviceDetailHtml);
    $('.search-result').css('display', 'none');
    setTimeout(() => {
        $('.search-result').removeAttr('style');
    }, 100);

});

$('.datepicker').datepicker({
    dateFormat: 'dd-mm-yy'
});

let htmlItem = '<li class="item-can-choose" data-index=\':index:\' data-type=":type:">'
    + '<div class="item-title">:title:</div>'
    + '<div class="item-body">'
    + '<span>:body:</span>'
    + '</div>'
    + '</li>';
let htmlLoading = '<div style="background-color: rgba(250, 251, 254, 1); display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>';

function addSearchResponse(response, type) {
    data = response;
    let html = '';
    response.map(function (item, index) {
        let value = htmlItem;
        let description = '';
        switch(type) {
            case 'bac-sy':
                if (item.specialist != null) {
                    description += 'Chuyên khoa: ' + item.specialist.name;
                    description += '<br/>';
                }
                if (item.hospital != null) {
                    description += 'Bệnh viện: ' + item.hospital.name;
                    description += '<br/>';
                    description += 'Địa chỉ: ' + item.hospital.address;
                    description += '<br/>';
                    description += '<span style="color: red; font-weight: 900">Giá khám: ' + numberWithCommas(item.examination_fee) + ' đồng</span>';
                }
            break;
            case 'benh-vien':
                description += 'Địa chỉ: ' + item.address + '<br/>' + item.description;
            break;
            case 'chuyen-khoa':
                description += item.description
            break;
        }
        value = value.replace(':index:', index);
        value = value.replace(':type:', type);
        value = value.replace(':title:', item.name);
        value = value.replace(':body:', description);
        html += value;
    });
    if (!html) {
        html = '<div style="display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px; font-weight: 900;">Không tìm thấy kết quả</div>';
    }
    $(`#${type}-goi-y`).html(html);
}

function search(keyWord, type) {
    $.ajax({
        url: appUrl + `/api/${type}?quick_search=${keyWord}`,
        type: 'GET',
        success: (response) => {
            addSearchResponse(response, type);
        },
        error: (response) => {
            console.log('error', response);
        }
    });
}

let timer;

$('#tim-bac-sy').on('keypress focus', function(event) {
    $('#error').css('display', 'none');
    $('#bac-sy-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'bac-sy');
    }, 2000);
});

$('#tim-chuyen-khoa').on('keypress focus', function(event) {
    $('#error').css('display', 'none');
    $('#chuyen-khoa-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'chuyen-khoa');
    }, 2000);
});

$('#tim-benh-vien').on('keypress focus', function(event) {
    $('#error').css('display', 'none');
    $('#benh-vien-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'benh-vien');
    }, 2000);
});

let errorText = 'Lỗi! Bạn chưa chọn :type:. Nếu bạn chưa quyết định chọn :type: nào thì hãy chọn mục "Tư vấn tôi chọn bác sỹ". Chúng tôi sẽ gọi điện tư vấn cho bạn';

$('.booking-form').on('submit', function (event) {
    console.log(event);
    let typeMap = {
        'bac-sy': 'bac sy',
        'chuyen-khoa': 'chuyen khoa',
        'benh-vien': 'benh vien',
    };
    let serviceType = $('.service-type').val();
    let serviceId = $('.service-id').val();
    if (serviceType != 'tu-van' && !serviceId) {
        event.preventDefault();
        let currentErrorText = errorText;
        currentErrorText = currentErrorText.replace(/:type:/g, typeMap[serviceType]);
        $('#error-message').text(currentErrorText);
        $('#error').css('display', 'block');
    }
});

$('#date-select').on('change', function (event) {
    $('.date').val(event.target.value);
});

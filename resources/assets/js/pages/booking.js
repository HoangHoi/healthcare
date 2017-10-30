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
});

$('.result-list').on('click', 'li', function (event) {
    console.log(event.target);
});

$('.datepicker').datepicker({
    dateFormat: 'dd-mm-yy'
});

let htmlItem = '<li class="item-can-choose" data-json=\':json:\'>'
    + '<div class="item-title">:title:</div>'
    + '<div class="item-body">'
    + '<span>:body:</span>'
    + '</div>'
    + '</li>';
let htmlLoading = '<div style="background-color: rgba(250, 251, 254, 1); display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>';

function addSearchResponse(response, type) {
    let descriptKey = 'description';
    if ('bac-sy') {
        descriptKey = 'info';
    }
    let html = '';
    response.map(function (item) {
        let value = htmlItem;
        value = value.replace(':json:', JSON.stringify(item));
        value = value.replace(':title:', item.name);
        value = value.replace(':body:', item[descriptKey]);
        html += value;
    });
    if (!html) {
        html = '<div style="display: flex; justify-content: center; align-items: center; padding: 10px; height: 100px; font-weight: 900;">Khong tim thay ket qua</div>';
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
    $('#bac-sy-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'bac-sy');
    }, 2000);
});

$('#tim-chuyen-khoa').on('keypress focus', function(event) {
    $('#chuyen-khoa-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'chuyen-khoa');
    }, 2000);
});

$('#tim-benh-vien').on('keypress focus', function(event) {
    $('#benh-vien-goi-y').html(htmlLoading);
    clearTimeout(timer);
    timer = setTimeout(() => {
        search(event.target.value, 'benh-vien');
    }, 2000);
});

// $('.result-list').onClick(function (event) {
//     console.log(event.target);
// });
console.log($('.result-list'));

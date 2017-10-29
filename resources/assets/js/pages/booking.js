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

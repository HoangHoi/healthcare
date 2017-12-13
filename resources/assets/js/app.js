require('./core/bootstrap');

$('.date').on('change', (evt) => {
    let selectedElement = evt.target.options[evt.target.selectedIndex];
    let scheduleId = $(evt.target).data('schedule');
    let scheduleHtml = '';
    let scheduleTimes = $(selectedElement).data('items');
    scheduleHtml = scheduleTimes.map((time) => {
        return `<li><a href="${time['link']}">${time['time']}</a></li>`;
    });
    $('#' + scheduleId).html(scheduleHtml);
})

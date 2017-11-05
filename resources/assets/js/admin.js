require('./core/bootstrap');

$('#toggle-button').click(function(event){
    console.log(event.target);
    // var toggleId =
    $('#' + $(event.target).data('toggle-content')).toggle('slow');
});

/*------------------
        Preloader
    --------------------*/
$(window).on('load', function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");
});

function errorMessage(message) {
    $.toast({
        text: message,
        loader: true,
        position: 'top-right',
        bgColor: '#d51a24',
        textColor: '#fff'
    });
}

function successMessage(message) {
    $.toast({
        text: message,
        loader: true,
        position: 'top-right',
        bgColor: '#7cb925',
        textColor: '#000'
    });
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})







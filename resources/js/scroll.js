$(document).ready(function() {
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 200) {
            $('.menu-home').addClass('scrolled');
            $('#scrollTop').fadeIn();
        } else {
            $('.menu-home').removeClass('scrolled');
            $('#scrollTop').fadeOut('slow');
        }
    });

    $('#scrollTop').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
    });
});

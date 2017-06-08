$( document ).ready(function(){
    $(".button-collapse").sideNav();

    $(window).scroll(function () {
        positionScroll = $(document).scrollTop();
        if (positionScroll >= 550)
        {
            $("#arrow-up-i").fadeIn(800);
        }
        else
        {
            $("#arrow-up-i").fadeOut(800);
        }
    });

    $("#arrow-up-i").click(function () {
        $('html,body').animate({scrollTop: 0}, 'slow');
    })
});
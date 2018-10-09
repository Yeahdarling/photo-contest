// navbar animation
$(window).scroll(function() {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > 1) {
        $('#navbar').css('padding', '0 15px')
    } else {
        $('#navbar').css('padding', '15px')
    }
    });

//to-top
$('.to-top').click(function (){
    $('html, body').animate({scrollTop: '0px'}, 300);
});

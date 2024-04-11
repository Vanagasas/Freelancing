$(document).ready(function(){
    var star = 0;
    $('.fa-star').hover(function(){
        $(this).css('color', '#00A8E8');
        $(this).prevAll().css('color', '#00A8E8');
        $(this).css('font-size', '1.1em');


    }, function(){
        $(this).css('color', 'black');
        $(this).prevAll().css('color', 'black');
        $(this).css('font-size', '1em');
    })
    $('.fa-star').click(function(){
        $('.fa-star').css('font-size', '1em');
        $('.fa-star').css('color', 'black');
        $(this).css('color', '#00A8E8');
        $(this).css('font-size', '1.1em');
        $(this).prevAll().css('color', '#00A8E8');
        $('.fa-star').unbind('mouseenter').unbind('mouseleave')
        star = $(this).attr('value');
        $('#hidden-star').val(star);
    })

})
$(document).ready(function(){
    $('.dropdown').click(function(){
        $(".dropdown-menu").toggle(300);
    });
    $('[value=v]').show();
    $('.selector').click(function(){
        $('.selector').removeClass('active-selector');
        $(this).addClass('active-selector');
        var selector = $(this).attr('name');
        $('.post-found').hide();
        $('[value = '+ selector +']').show();
    });
});
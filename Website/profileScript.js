$(document).ready(function(){
    $('.edit-field-display').hide();
    $('.finish-edit-button').hide();
    $('.cancel-edit-button').hide();
    $('.edit-button').click(function(){
        $('.edit-field-display').show();
        $('.field-display').hide();
        $('.finish-edit-button').show();
        $('.cancel-edit-button').show();
        $('.start-edit-button').hide();
    });
    $('.finish-edit-button').click(function(){

    });
    $('.cancel-edit-button').click(function(){
        $('.edit-field-display').hide();
        $('.field-display').show();
        $('.finish-edit-button').hide();
        $('.cancel-edit-button').hide();
        $('.start-edit-button').show();
    });
    $('.dropdown').click(function(){
        $(".dropdown-menu").toggle(300);
    });
    
});
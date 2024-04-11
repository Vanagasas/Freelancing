$(document).ready(function(){

    $('.add-skill-button').click(function(){
        var inputValue = $('.skill-input').val();
        if (inputValue != ""){
            $('.selected-skills').append('<div class="picked-skill"><input name="input-skill[]" value="'+ inputValue +'" type="hidden"/><span class="fas fa-times close-skill"></span> '+ inputValue +'</div> ');
            $('.skill-input').val("");
        }
    });
    $('.selected-skills').on("click", ".close-skill", function(){
        $(this).parent().hide();
    });
    $('.dropdown').click(function(){
        $(".dropdown-menu").toggle(300);
    });
    
});
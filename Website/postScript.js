$(document).ready(function(){
    $('.one-type-input').hide();
    $('.two-type-input').hide();
    $('.error').hide();
    $('.add-skill-button').click(function(){
        var inputValue = $('.skill-input').val();
        if (inputValue != ""){
            $('.selected-skills').append('<div class="picked-skill"><input name="input-skill[]" value="'+ inputValue +'" type="hidden"/><span class="fas fa-times close-skill"></span> '+ inputValue +'</div>');
            $('.skill-input').val("");
        }
    });
    
    $('.selected-skills').on("click", ".close-skill", function(){
        $(this).parent().hide();
    });
    $('.payment-suggestion').click(function(){
        $("[value=selected-payment]").removeClass("selected-payment");
        $("[value=selected-payment]").attr("value", "");
        $("[value=param-payment]").attr("value", "")
        $(this).attr("value", "selected-payment");
        $(this).addClass("selected-payment");
        $(this).children().attr("value", "param-payment")
        if ($(this).hasClass('one-input')){
            $('.two-type-input').hide();
            $('.one-type-input').show();
        }
        else if ($(this).hasClass('two-input')){
            $('.one-type-input').hide();
            $('.two-type-input').show();
        }
        else {
            $('.one-type-input').hide();
            $('.two-type-input').hide();
        }
    });
    $('#post-form').submit(function(event){
        var name = $(".project-name-input").val();
        var details = $(".project-details-input").val();
        var priceSingle = $(".project-price-single-input").val();
        var priceDoubleFirst = $(".project-double-first-input").val();
        var priceDoubleSecond = $(".project-double-second-input").val();
        if (name == ''){
            $('.error-name').show();
            event.preventDefault();
        }
        else{
            $('.error-name').hide();
        }
        if (details == ''){
            $('.error-details').show();
            event.preventDefault();
        }
        else{
            $('.error-details').hide();
        }
        if ($("[name=payment-one-first]").attr("value") == "selected-payment" || $("[name=payment-one-second]").attr("value") == "selected-payment"){
            if (!$.isNumeric(priceSingle) || priceSingle < 0){
                $('.error-price').show();
                event.preventDefault();
            }
            else{
                $('.error-price').hide();
            }
        }
        else if ($("[name=payment-two-first]").attr("value") == "selected-payment" || $("[name=payment-two-second]").attr("value") == "selected-payment"){
            if (!$.isNumeric(priceDoubleFirst) || !$.isNumeric(priceDoubleSecond) || priceDoubleFirst < 0 || priceDoubleSecond < 0 || priceDoubleFirst >= priceDoubleSecond){
                $('.error-price').show();
                event.preventDefault();
            }
            else{
                $('.error-price').hide();
            }
        }
        else if($(".none").attr("value") == "selected-payment"){
            $('.error-skills').hide();
        }
        else{
            $('.error-price').show();
            event.preventDefault();
        }
        if ($('.selected-skills').children().length == 0){
            $('.error-skills').show();
            event.preventDefault();
        }
        else{
            $('.error-skills').hide();
        }
    });
});
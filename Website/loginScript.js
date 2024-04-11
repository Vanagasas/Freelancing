$(document).ready(function(){
    $('.error-message').hide();
    $('#signUp').click(function(){
        $('.login-form-container').addClass('right-panel-active');
    });
    $('#Login').click(function(){
        $('.login-form-container').removeClass('right-panel-active');
    });
    $('#signup-form').submit(function(event){
        var username = $('#sign-up-form-username').val();
        var email = $('#sign-up-form-email').val();
        var password = $('#sign-up-form-password').val();
        var userPassRegex = /^[a-zA-Z0-9]+$/;
        var emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (username == ''){
            $('#sign-up-form-username').addClass('error');
            $('.username-error').show();
            $('.username-error').text('Username can not be empty');
            event.preventDefault();
        }
        else if (!username.match(userPassRegex)){
            $('#sign-up-form-username').addClass('error');
            $('.username-error').show();
            $('.username-error').text('Username must not contain special characters');
            event.preventDefault();
        }
        else if (username.length <= 5 || username.length > 20){
            $('.username-error').show();
            $('.username-error').text('Username must be between 6 - 20 characters long');
            event.preventDefault();
        }
        else{
            $('#sign-up-form-username').removeClass('error');
            $('.username-error').hide();
        }
        if (password == ''){
            $('#sign-up-form-password').addClass('error');
            $('.password-error').show();
            $('.password-error').text('Password can not be empty');
            event.preventDefault();
        }
        else if (!password.match(userPassRegex)){
            $('#sign-up-form-password').addClass('error');
            $('.password-error').show();
            $('.password-error').text('Password must not contain special characters');
            event.preventDefault();
        }
        else if (password.length <= 5){
            $('#sign-up-form-password').addClass('error');
            $('.password-error').show();
            $('.password-error').text('Password must be at least 6 characters long');
            event.preventDefault();
        }
        else{
            $('#sign-up-form-password').removeClass('error');
            $('.password-error').hide();
        }
        if (!email.match(emailRegex)){
            $('#sign-up-form-email').addClass('error');
            $('.email-error').show();
            event.preventDefault();
        }
        else{
            $('#sign-up-form-email').removeClass('error');
            $('.email-error').hide();
            
        }
        
    });
    $('#login-form').submit(function(event){
        var username = $('#login-form-username').val();
        var password = $('#login-form-password').val();
        if (username == ''){
            $('.login-username-error').show();
            $('.login-username-error').addClass('error');
            $('.login-username-error').text('Username can not be empty');
            event.preventDefault();
        }
        else{
            $('.login-username-error').hide();
            $('.login-username-error').removeClass('error');
        }
        if (password == ''){
            $('.login-password-error').show();
            $('.login-password-error').addClass('error');
            $('.login-password-error').text('Password can not be empty');
            event.preventDefault();
        }
        else{
            $('.login-password-error').hide();
            $('.login-password-error').removeClass('error');
        }
        
        
    });
});
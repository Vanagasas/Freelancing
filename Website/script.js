$(document).ready(function(){
    //Toggle header class when scrolling down from top and scrolling back to the top
    $(document).scroll(function () {
        $('.main-header').toggleClass('scrolled-header', $(this).scrollTop() > $('.main-header').height());
        $('.nav-button').toggleClass('scrolled-header-text', $(this).scrollTop() > $('.main-header').height());
    });
    $('.dropdown').click(function(){
        $(".dropdown-menu").toggle(300);
    });
    
    
    //Stores canvas display element
    var display = document.getElementById('canvas-display');
    //Store canvas width
    var display_width;
    //Store canvas hight
    var display_hight;
    //Contex type
    var ctx = display.getContext('2d');
    //Array for active dots
    var active_dots = [];
    //Ball Radius
    var R = 2;
    //Line distance limit
    var distance = 300;
    
    //Display dots on canvas
    function displayDots(){
        active_dots.forEach(function(selected_dot){
               ctx.fillStyle ='white';
               ctx.beginPath();
               ctx.arc(selected_dot.x, selected_dot.y, 3, 0, Math.PI*R);
               ctx.fill();
        });
    }
    //Display lines connecting the dots
    function displayLines(){
        var distance_fraction;
        var line_opacity;
        var temp_x;
        var temp_y;
        for (var i = 0; i < active_dots.length; i++) {
            for (var j = i + 1; j < active_dots.length; j++) {
                temp_x = Math.abs(active_dots[i].x - active_dots[j].x);
                temp_y = Math.abs(active_dots[i].y - active_dots[j].y);
                distance_fraction = Math.sqrt(temp_x * temp_x + temp_y * temp_y) / distance;
                if(distance_fraction < 1){
                    line_opacity = (1 - distance_fraction).toString();
                    ctx.strokeStyle = 'rgba(200,200,200,'+line_opacity+')';
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(active_dots[i].x, active_dots[i].y);
                    ctx.lineTo(active_dots[j].x, active_dots[j].y);
                    ctx.stroke();
               }
            }
        }
    }
    //Change the speed of the dots
    function getRandomVelocity(){
        var min = -0.1;
        var max = 0.1;
        return Math.random()*(max - min) + min;
    }
    //Get a starting point of a dot
    function randomPosition(length){
        return Math.ceil(Math.random() * length);
    }
    //Randomize Axis to avoid dots in the middle
    function randomAxis(max){
        return Math.floor(Math.random() * Math.floor(max));
    }
    //Add new dot
    function getRandomDot(){
        var x_axis;
        var y_axis;
        if(randomAxis(3) == 1){
            y_axis = randomPosition(display_hight);
            if(randomAxis(2)){
                x_axis = display_width;
            }
            else{
                x_axis = 0;
            }
        }
        else{
            x_axis = randomPosition(display_width);
            if(randomAxis(2)){
                y_axis = display_hight;
            }
            else{
                y_axis = 0;
            }
        }
        return {
            x: x_axis,
            y: y_axis,
            velocity_x: getRandomVelocity(),
            velocity_y: getRandomVelocity(),
        }
    }
    //Add new dots if there are not enough dots on the canvas
    function dotLimit(){
        if(active_dots.length < 50){
            active_dots.push(getRandomDot());
        }
    }
    //Update the location of the dots
    function updateDots(){
        var new_dot_spot = [];
        active_dots.forEach(function(new_location){
            new_location.x += new_location.velocity_x;
            new_location.y += new_location.velocity_y;
            if(new_location.x > -(25) && new_location.x < (display_width+25) && new_location.y > -(25) && new_location.y < (display_hight+25)){
               new_dot_spot.push(new_location);
            }
        });
        active_dots = new_dot_spot;
    }
    //Get accurate canvas width
    function startingDisplay(){
        display.setAttribute('width', window.innerWidth);
        display.setAttribute('height', window.innerHeight);
        display_width = parseInt(display.getAttribute('width'));
        display_hight = parseInt(display.getAttribute('height'));

    }
    //Adds dots all over the canvas when first opened
    function startingDots(dot_amount){
        for(var i = 1; i <= dot_amount; i++){
            active_dots.push({
                x: randomPosition(display_width),
                y: randomPosition(display_hight),
                velocity_x: getRandomVelocity(),
                velocity_y: getRandomVelocity(),
            });
        }
    }
    //Displays all the dots and the lines while additionally animating the process
    function displayAnimations(){
        ctx.clearRect(0, 0, display_width, display_hight);
        displayDots();
        displayLines();
        updateDots();
        dotLimit();
        window.requestAnimationFrame(displayAnimations);
    }
    function startAnimation(){
        startingDisplay();
        startingDots(50);
        window.requestAnimationFrame(displayAnimations);
    }
    startAnimation();
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});
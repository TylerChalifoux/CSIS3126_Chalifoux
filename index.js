$(document).ready(function(){

    $('#indexPageSignUpButton').click(function(){
        window.open("http://tchalifoux.jwuclasses.com/new_account_page.php");
    });

    $('#indexPageSignInButton').click(function(){
        window.open("http://tchalifoux.jwuclasses.com/login_page.php");
    });

    //-------Everything below is for the slideshow on the front page----------
    let slideIndex = 0;
    showSlides();

    function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slideshow");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1
    }    
    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 4000);
    }



});
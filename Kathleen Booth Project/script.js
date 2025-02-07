function showPassword(){
    var password=document.getElementById("password");
        if(password.type==="password"){
            password.type="text";
        }
        else{
            password.type="password";
        }
    }   

// Slide show on main page for instagram post
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
    showSlides(slideIndex += n);
}
function currentSlide(n) {
    showSlides(slideIndex = n);
}
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    // var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    // for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" active", "");
    // }
    slides[slideIndex - 1].style.display = "flex";
    // dots[slideIndex - 1].className += " active";
}

function cutofftext(x){
    let y =document.getElementById("designation");
    console.log(y.innerText);
    let x=""
    for (i in y){
        if (i <10){
            x+= y[i]
        }
    }
    return(x);
}
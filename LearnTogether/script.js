// กำหนด slideIndex เป็น1
let slideIndex = 1;

// กดเปลี่ยนสไลด์
function plusSlides(n) {
    showSlides(slideIndex +=n);
}

// dot เปลี่ยนไลด์
function currentSlide(n) {
    showSlides(slideIndex = n);
}

// รูปภาพสไลด์
function showSlides(n) {
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n <1 ) {
        slideIndex = slides.length;
    }

    for(let i = 0; i <slides.length; i++) {
        slides[i] .style.display = "none";
    }

    for(let i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace(" active","")
    }

    // sladeIndex -1 = 0, first img
    // sladeIndex +0 = 1, second img
    // sladeIndex +1 = 2, third img
    slides[slideIndex-1].style.display= 'block';

    dots[slideIndex-1].className += " active";


   
}



showSlides(slideIndex);
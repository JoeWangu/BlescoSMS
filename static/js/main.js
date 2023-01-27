var slideIndex = 1;
showSlides(slideIndex);

var intervalId = setInterval(function () {
  plusSlides(1);
}, 300000000);//3000

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

var slideshowContainer = document.getElementsByClassName(
  "slideshow-container"
)[0];
slideshowContainer.addEventListener("mouseover", stopSlideshow);
slideshowContainer.addEventListener("mouseout", startSlideshow);

function stopSlideshow() {
  clearInterval(intervalId);
}

function startSlideshow() {
  intervalId = setInterval(function () {
    plusSlides(1);
  }, 30000000);//3000
}

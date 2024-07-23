<?php
include("header.php");
?>


<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="h1.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="h2.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="h3.jpg" style="width:100%">
    </div>
    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
</div>

<div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide">
                <img src="p1.jpg" alt="Image" class="img-fluid" />
                <img src="p2.jpg" alt="Image" class="img-fluid" />
                <img src="p3.jpg" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>





          <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
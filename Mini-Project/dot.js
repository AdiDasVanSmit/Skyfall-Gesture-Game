let slideIndex = 0;
const slides = document.querySelectorAll(".slider img");
const dots = document.querySelectorAll(".dot");

showSlides();

function showSlides() {
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }
  dots[slideIndex - 1].classList.add("active");
  setTimeout(showSlides, 2000); // Change image every 4 seconds
}

for (let i = 0; i < dots.length; i++) {
  dots[i].addEventListener("click", function () {
    slideIndex = i + 1;
    showSlides();
  });
}

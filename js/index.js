//Adding functionalities for the slider
const allSlides = document.querySelectorAll(".slider__slide-item");
const radioButtons = document.querySelectorAll(".radio-btn");
const leftArrow = document.querySelector(".left");
const rightArrow = document.querySelector(".right");
let slideInterval;
const intervalTime = 5000;

//Adding automatic navigation to the slider

const moveToNextSlide = () => {
  //finding the elements witht the current and active classes
  let currentSlide = document.querySelector(".current");
  let currentRadio = document.querySelector(".active");

  //Removing the current and active classes from the current slide and current radio button
  currentSlide.classList.remove("current");
  currentRadio.classList.remove("active");

  if (currentSlide.nextElementSibling) {
    currentSlide.nextElementSibling.classList.add("current");
    currentRadio.nextElementSibling.classList.add("active");
  } else {
    allSlides[0].classList.add("current");
    radioButtons[0].classList.add("active");
  }
};

const moveToPrevSlide = () => {
  let currentSlide = document.querySelector(".current");
  let currentRadio = document.querySelector(".active");

  currentSlide.classList.remove("current");
  currentRadio.classList.remove("active");

  if (currentSlide.previousElementSibling) {
    currentSlide.previousElementSibling.classList.add("current");
    currentRadio.previousElementSibling.classList.add("active");
  } else {
    allSlides[allSlides.length - 1].classList.add("current");
    radioButtons[radioButtons.length - 1].classList.add("active");
  }
};

slideInterval = setInterval(moveToNextSlide, intervalTime);

//Creating a function to clear the interval
const clearSlideInterval = () => {
  clearInterval(slideInterval);
  slideInterval = setInterval(moveToNextSlide, intervalTime);
};

//Adding manual navigation through arrows
//Right arrow
rightArrow.addEventListener("click", (event) => {
  event.preventDefault();
  moveToNextSlide();
  clearSlideInterval();
});

//Left arrow
leftArrow.addEventListener("click", (event) => {
  event.preventDefault();
  moveToPrevSlide();
  clearSlideInterval();
});

//Adding manual radio button navigation
radioButtons.forEach((item, index) => {
  item.addEventListener("click", () => {
    manualRadioNavigation(index);
  });
});

const manualRadioNavigation = (index) => {
  for (let i = 0; i < allSlides.length; i++) {
    //Removing the current and the active class from the previous slides and adding it the new slide
    if (i !== index) {
      allSlides[i].classList.remove("current");
      radioButtons[i].classList.remove("active");
    } else {
      allSlides[index].classList.add("current");
      radioButtons[index].classList.add("active");
    }
  }

  clearSlideInterval();
};

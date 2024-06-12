/*========================
 Manifest js
 ==========================*/
// window.onload = () => {
//   'use strict';
//   if ('serviceWorker' in navigator) {
//     navigator.serviceWorker
//       .register('sw.js');
//   }
// }

/*=====================
    wishlist added start
==========================*/
const divs = document.querySelectorAll(".like-btn");
divs.forEach((el) =>
  el.addEventListener("click", (event) => {
    event.target.parentNode.classList.toggle("animate");
    event.target.parentNode.classList.toggle("active");
    event.target.parentNode.classList.toggle("inactive");
  })
);

/*====================
 Ratio js
=======================*/
window.addEventListener("load", () => {
  const bgImg = document.querySelectorAll(".bg-img");
  for (i = 0; i < bgImg.length; i++) {
    let bgImgEl = bgImg[i];

    if (bgImgEl.classList.contains("bg-top")) {
      bgImgEl.parentNode.classList.add("b-top");
    } else if (bgImgEl.classList.contains("bg-bottom")) {
      bgImgEl.parentNode.classList.add("b-bottom");
    } else if (bgImgEl.classList.contains("bg-center")) {
      bgImgEl.parentNode.classList.add("b-center");
    } else if (bgImgEl.classList.contains("bg-left")) {
      bgImgEl.parentNode.classList.add("b-left");
    } else if (bgImgEl.classList.contains("bg-right")) {
      bgImgEl.parentNode.classList.add("b-right");
    }

    if (bgImgEl.classList.contains("blur-up")) {
      bgImgEl.parentNode.classList.add("blur-up", "lazyload");
    }

    if (bgImgEl.classList.contains("bg_size_content")) {
      bgImgEl.parentNode.classList.add("b_size_content");
    }

    bgImgEl.parentNode.classList.add("bg-size");
    const bgSrc = bgImgEl.src;
    bgImgEl.style.display = "none";
    bgImgEl.parentNode.setAttribute(
      "style",
      `
      background-image: url(${bgSrc});
      background-size:cover;
      background-position: center;
      background-repeat: no-repeat;
      display: block;
      `
    );
  }
});

/*====================
 Range js
=======================*/
const rangeInputs = document.querySelectorAll('input[type="range"]');
const numberInput = document.querySelector('input[type="number"]');

function handleInputChange(e) {
  let target = e.target;
  if (e.target.type !== "range") {
    target = document.getElementById("range");
  }
  const min = target.min;
  const max = target.max;
  const val = target.value;

  target.style.backgroundSize = ((val - min) * 100) / (max - min) + "%100%";
}

rangeInputs.forEach((input) => {
  input.addEventListener("input", handleInputChange);
});




/*====================
 tap to top js
=======================*/
const tapTopBtn = document.querySelector(".tap-to-top-button")
const tapTopTopBox = document.querySelector(".tap-to-top-box")
tapTopBtn ?.addEventListener("click", function () {
  window.scroll({
    top: 0,
    behavior: 'smooth'
  });
})
if (tapTopTopBox) {
  window.onscroll = function () {
    if (pageYOffset >= 100) {
      tapTopTopBox.classList.remove("hide")
    } else {
      tapTopTopBox.classList.add("hide")
    }
  }
}
(function() {
  "use strict";
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
  let heroCarouselIndicators = select("#hero-carousel-indicators")
  let heroCarouselItems = select('#heroCarousel .carousel-item', true)

  heroCarouselItems.forEach((item, index) => {
    (index === 0) ?
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
      heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"
  });


  document.addEventListener("DOMContentLoaded", function (event) {
    var scrollpos = sessionStorage.getItem('scrollpos');
    if (scrollpos) {
        window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
    }
});

window.addEventListener("beforeunload", function (e) {
    sessionStorage.setItem('scrollpos', window.scrollY);
});

let stars = document.querySelectorAll(".notationIcon");

if (stars.length> 0) {
  stars.forEach((star,index) => {
    star.addEventListener("mouseover",(e) => {
      for (let i = 0 ; i <= index ; i++) {
        let starFill = document.querySelectorAll(".notationIcon")[i];
        if (!starFill.classList.contains("note")){
        starFill.classList.remove("bi-star");
        starFill.classList.add("bi-star-fill");
        }
      }
    })
    star.addEventListener("mouseleave",(e) => {
      for (let i = 0 ; i <= index ; i++) {
        let starFill = document.querySelectorAll(".notationIcon")[i];
        if (!starFill.classList.contains("note")){
          starFill.classList.add("bi-star");
          starFill.classList.remove("bi-star-fill");
        }

      }
    })
  })
}


}
)()
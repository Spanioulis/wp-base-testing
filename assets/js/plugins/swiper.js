import Swiper from "swiper/bundle";
// import styles bundle
import "swiper/css/bundle";

export function initSwiper() {
  const slides = document.querySelectorAll(".swiper .swiper-slide");
  const loopMode = slides.length > 3;

  const swiper = new Swiper(".swiper", {
    speed: 450,
    slidesPerView: 1,
    spaceBetween: 15,
    loop: loopMode,
    observer: true,
    observeParents: true,
    parallax: true,
    navigation: {
      prevEl: ".swiper-button-prev",
      nextEl: ".swiper-button-next",
    },
  });
}

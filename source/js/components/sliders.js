import Swiper from "swiper";
import { Pagination, Navigation } from "swiper/modules";

document.addEventListener("DOMContentLoaded", function () {
  const mainSwiperBreakPoint = window.matchMedia("(min-width: 1024px)");
  const reviewSwiperBreakPoint = window.matchMedia("(min-width: 1240px)");
  const productSlider = document.querySelector(".products-slider");

  const mainSwiperContainers = document.querySelectorAll(
    ".main-slider .swiper-container"
  );
  const reviewSwiperContainers = document.querySelectorAll(
    ".review-slider .swiper-container"
  );

  const mainSwiperInstances = new Map();
  const reviewSwiperInstances = new Map();

  function initOrDestroyMainSwipers() {
    mainSwiperContainers.forEach((container) => {
      const mainSlider = container.closest(".main-slider");
      const type = mainSlider?.dataset.slider;
      const paginationEl = mainSlider?.querySelector(".slider-pagination");

      const isActive = mainSwiperInstances.has(container);

      if (mainSwiperBreakPoint.matches) {
        if (isActive) {
          mainSwiperInstances.get(container).destroy(true, true);
          mainSwiperInstances.delete(container);
        }
      } else {
        if (!isActive) {
          const swiper = new Swiper(container, {
            modules: [Pagination],
            spaceBetween: 16,
            loop: false,
            breakpoints: {
              0: {
                slidesPerView: 1,
              },
              531: {
                slidesPerView: type === "auto" ? "auto" : 1,
              },
            },
            pagination: {
              el: paginationEl,
              clickable: true,
            },
          });
          mainSwiperInstances.set(container, swiper);
        }
      }
    });
  }

  function initOrDestroyReviewSwipers() {
    reviewSwiperContainers.forEach((container) => {
      const reviewSlider = container.closest(".review-slider");
      const paginationEl = reviewSlider?.querySelector(".slider-pagination");

      const isActive = reviewSwiperInstances.has(container);

      if (reviewSwiperBreakPoint.matches) {
        if (isActive) {
          reviewSwiperInstances.get(container).destroy(true, true);
          reviewSwiperInstances.delete(container);
        }
      } else {
        if (!isActive) {
          const swiper = new Swiper(container, {
            modules: [Pagination],
            spaceBetween: 16,
            loop: false,
            slidesPerView: "auto",
            breakpoints: {
              0: {
                slidesPerView: 1,
              },
              531: {
                slidesPerView: "auto",
              },
            },
            pagination: {
              el: paginationEl,
              clickable: true,
            },
          });
          reviewSwiperInstances.set(container, swiper);
        }
      }
    });
  }

  
  if (productSlider) {
    const container = productSlider.querySelector(".swiper-container");
    const contorls = document.querySelector('.product-controls');
    const prevBtn = contorls.querySelector(".slider-btn.prev");
    const nextBtn = contorls.querySelector(".slider-btn.next");

    const swiper = new Swiper(container, {
      modules: [Navigation],
      spaceBetween: 16,
      loop: false,
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        650: {
          slidesPerView: 2,
        },
        1100: {
          slidesPerView: 3,
        },
      },
    });
  }

  mainSwiperBreakPoint.addEventListener("change", initOrDestroyMainSwipers);
  reviewSwiperBreakPoint.addEventListener("change", initOrDestroyReviewSwipers);

  initOrDestroyMainSwipers();
  initOrDestroyReviewSwipers();
});

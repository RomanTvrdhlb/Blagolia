import Swiper from 'swiper';
import {Navigation, EffectFade, Autoplay} from 'swiper/modules';

document.addEventListener("DOMContentLoaded", function () {
    const mainSliders = document.querySelectorAll('.hero-slider');

    mainSliders.forEach(function(slider){
        const container = slider.querySelector('.swiper-container');
        const nextBtn = slider.querySelector(".next");
        const prevBtn = slider.querySelector(".prev");

        const mainSwiper = new Swiper(slider, {
            modules:[Navigation, EffectFade, Autoplay],
            spaceBetween: 0,
            slidesPerView: 1,
            effect: 'fade',
            loop: true,
            speed: 800,
            autoplay: {
                delay: 3500,
            },
            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },
        });
    });
});

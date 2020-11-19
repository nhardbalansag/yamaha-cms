require('./bootstrap');
require("swiper");
require("swiper/bundle");
import Swiper from 'swiper';
import swiper from 'swiper/bundle';

(function() {
    // Custom script
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        slidesPerGroup: 1,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            772: {
            slidesPerView: 2,
            spaceBetweenSlides: 10
            },
            1111: {
                slidesPerView: 3,
                spaceBetweenSlides: 10
            },
         
        }
      });

})();

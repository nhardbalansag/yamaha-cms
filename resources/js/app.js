require('./bootstrap');
require("swiper");
require("swiper/bundle");
import Swiper from 'swiper';
import swiper from 'swiper/bundle';

(function() {
    // Custom script
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 2,
        spaceBetween: 20,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: false,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1111: {
                slidesPerView: 4,
                spaceBetweenSlides: 10
            },
         
        }
      });
    

})();

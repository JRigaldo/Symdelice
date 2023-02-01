jQuery(function ($) {
    $(document).ready(function () {
        var swiperL = document.querySelector('.swiper-l');
        if (typeof swiperL !== 'undefined' && swiperL) {
            var swiperLeft = new Swiper(".swiper-l", {
                slidesPerView: 2,
                centeredSlides: false,
                spaceBetween: 10,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                    type: 'bullets',
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    500: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                        mode: 'horizontal',
                        freeMode: true,
                    },
                    768: {

                        slidesPerView: 3,
                        spaceBetween: 35,
                    },
                    1100: {
                        slidesPerView: 4,

                    },
                    1920: {
                        slidesPerView: 7,
                        spaceBetweenSlides: 35
                    }
                }
            });
        }
    });
});
import Swiper, {Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay} from 'swiper'

Swiper.use([Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay])

function heroSlider () {

    let $heroSlider = document.querySelector('.hero__slider');

    if ($heroSlider) {
        const $heroSwiper = new Swiper('.hero__slider', {
            direction: 'horizontal',
            loop: true,
            // effect: 'fade',
            // fadeEffect: {
            //     crossFade: true,
            // },
            autoplay: {
                delay: 8000,
            },

            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },

            pagination: {
                el: '.hero__pagination',
                type: 'bullets',
                clickable: true,
            },

            breakpoints: {
                0: {

                },

                800: {

                }
            }

        })

    }
}


export default heroSlider


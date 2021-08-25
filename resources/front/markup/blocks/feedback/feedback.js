import Swiper, {Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay} from 'swiper'

Swiper.use([Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay])

function feedbackSlider () {

    let $feedbackSlider = document.querySelector('.feedback__slider');

    if ($feedbackSlider) {
        const $heroSwiper = new Swiper('.feedback__slider', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 2,
            pagination: {
                el: '.feedback__pagination',
                type: 'bullets',
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },

                800: {
                    slidesPerView: 2,
                }
            }

        })

    }
}


export default feedbackSlider


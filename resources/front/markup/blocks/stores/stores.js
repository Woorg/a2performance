import Swiper, {Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay} from 'swiper'

Swiper.use([Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay])

function storesSlider () {

    let $storeSlider = document.querySelector('.stores__slider');

    if ($storeSlider) {
        const $storesSwiper = new Swiper('.stores__slider .swiper-container', {
            direction: 'horizontal',
            loop: false,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            pagination: {
                el: '.stores__dots',
                type: 'bullets',
                clickable: true,
            },

            /* events */
            on: {
                slideChange: function(){
                    let currentSlide = this.realIndex + 1

                    let totalSlides = document.querySelectorAll('.swiper-pagination-bullet').length

                    let $storeCounter = document.querySelector('.stores__counter');

                    $storeCounter.innerHTML = '0' + currentSlide + '/0' + totalSlides
                },
                paginationRender: function(){
                    let currentSlide = this.realIndex + 1

                    let totalSlides = document.querySelectorAll('.swiper-pagination-bullet').length

                    let $storeCounter = document.querySelector('.stores__counter');

                    $storeCounter.innerHTML = '0' + currentSlide + '/0' + totalSlides

                }
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


export default storesSlider


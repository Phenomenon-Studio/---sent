import { navigation, pagination } from '@components/UI/slider/slider.function';

export default class Slider {
    constructor($slider) {
        this.$slider = $slider;
        this.$actions = $slider.querySelectorAll('[data-slider-action]');
    }

    init() {
        import(/* webpackChunkName: "swiper" */ 'swiper/core').then(module => {
            const { Navigation, Pagination } = module;
            const Swiper = module.default;
            Swiper.use([Navigation, Pagination]);
            const $slider = this.$slider;
            let sliderIndex = 0;

            this.swiper = new Swiper($slider, {
                spaceBetween: 0,
                slidesPerView: 'auto',
                initialSlide: 0,
                watchOverflow: true,
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                navigation: { ...navigation($slider) },
                pagination: { ...pagination($slider) },
                on: {
                    snapIndexChange: ({ snapIndex }) => (sliderIndex = snapIndex),
                },
            });

            if (this.$actions) {
                $slider.addEventListener('click', e => {
                    const $target = e.target.closest('[data-slider-action]') || null;

                    if ($target) {
                        e.preventDefault();

                        const name = $target.getAttribute('data-slider-action');

                        switch (name) {
                            case 'next':
                                this.swiper?.slideTo(++sliderIndex);
                                break;
                            default:
                                break;
                        }
                    }
                });
            }
        });
    }

    destroy() {
        if (this.swiper !== null) {
            this.swiper.destroy();
            this.swiper = null;
        }
    }
}

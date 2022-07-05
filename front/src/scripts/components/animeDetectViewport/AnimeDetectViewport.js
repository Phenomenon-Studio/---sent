import { useIntersectionObserver } from '@helpers/utils';
import {
    titleAnime,
    liftUpAnime,
    liftUpGroup,
    fadeInRight,
    fadeInLeft,
    fadeIn,
    scaleDecrease,
} from '@components/animeDetectViewport/animeDetectViewport.function';

export default class AnimeDetectViewport {
    constructor($els) {
        this.$els = $els;
        this.observes = [];
    }

    init() {
        this.$els.forEach(($el, i) => {
            this.detectEl($el, i);
        });
    }

    detectEl($el, i) {
        let descriptor = null;
        let params = null;
        this.observes.push(
            useIntersectionObserver($el, target => {
                if (target.isIntersecting) {
                    const value = $el.getAttribute('data-el-anime');

                    switch (value) {
                        case 'title':
                            titleAnime($el, 75);
                            break;
                        case 'lift-up':
                            descriptor = $el.getAttribute('data-descriptor') || null;
                            params = $el.getAttribute('data-anime-params')?.split(':') || [];
                            liftUpAnime($el, 100, params[0] || 700, params[1] || 350, descriptor);
                            break;
                        case 'fade-in-right':
                            fadeInRight($el);
                            break;
                        case 'fade-in-left':
                            params = $el.getAttribute('data-anime-params')?.split(':') || [];
                            fadeInLeft($el, params[0] || 1200, params[1] || 50);
                            break;
                        case 'scale-decrease':
                            scaleDecrease($el);
                            break;
                        case 'lift-up-group':
                            liftUpGroup($el);
                            break;
                        case 'fade-in':
                            fadeIn($el);
                            break;
                        default:
                            break;
                    }
                    this.observes[i]();
                }
            })
        );
    }
}

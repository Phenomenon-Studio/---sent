import anime from 'animejs/lib/anime.es.js';
import { wrapWords, wrapChars } from '@helpers/utils';

const removeFromElementsPropWillChange = elements => {
    elements.forEach(({ target }) => {
        target.classList.add('reset-will-change');
    });
};

export const fadeInRight = ($element, duration = 1200, delay = 50) => {
    anime({
        targets: $element,
        translateX: {
            value: ['150%', '0%'],
            delay: 50,
            duration: duration,
            easing: 'easeInOutSine',
        },
        opacity: {
            value: 1,
            delay: delay + 50,
            duration: duration * 0.7,
            easing: 'easeInOutSine',
        },
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const fadeInLeft = ($element, duration = 1200, delay = 50) => {
    anime({
        targets: $element,
        translateX: {
            value: ['-150%', '0%'],
            delay: 50,
            duration: duration,
            easing: 'easeInOutSine',
        },
        opacity: {
            value: 1,
            delay: delay + 50,
            duration: duration * 0.7,
            easing: 'easeInOutSine',
        },
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const titleAnime = ($title, translateY) => {
    $title.innerHTML = wrapWords($title.textContent);
    const $words = $title.querySelectorAll('.word');
    $words.forEach($word => {
        $word.innerHTML = wrapChars($word.textContent);
    });
    const $letters = $title.querySelectorAll('.letter');

    anime({
        targets: $title,
        opacity: 1,
        duration: 0,
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });

    anime({
        targets: $letters,
        translateY: {
            value: [translateY, 0],
            easing: 'easeOutElastic(1, .4)',
        },
        scale: [0, 1],
        duration: 1500,
        delay: (_, i) => 20 * i,
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const liftUpAnime = ($block, translateY, duration, delay, descriptor = false) => {
    anime({
        targets: $block,
        translateY: {
            value: [translateY, 0],
            delay: delay,
            duration: duration,
            easing: 'easeInOutSine',
        },
        opacity: {
            value: 1,
            delay: duration - 100,
            duration: delay - 150,
            easing: 'easeInOutSine',
        },
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
            descriptor
                ? buttonAnime($block.closest('[data-holder-anime]').querySelector(`[data-wait-anime="${descriptor}"]`))
                : null;
        },
    });
};

export const buttonAnime = $button => {
    anime({
        targets: $button,
        opacity: {
            value: 1,
            delay: 30,
            duration: 250,
            easing: 'easeInOutSine',
        },
        translateY: {
            value: [20, 0],
            delay: 75,
            duration: 300,
            easing: 'easeInOutSine',
        },
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const fadeIn = ($element, delay = 30, duration = 1000) => {
    anime({
        targets: $element,
        opacity: [0, 1],
        duration: duration,
        delay,
        easing: 'easeInOutSine',
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const scaleDecrease = ($element, delay = 0) => {
    anime({
        targets: $element,
        opacity: 1,
        scale: [1.5, 1],
        duration: 1000,
        delay,
        easing: 'easeInOutSine',
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

export const liftUpGroup = $element => {
    anime({
        targets: $element.querySelectorAll('[data-item-anime]'),
        opacity: [0, 1],
        translateY: [160, 0],
        duration: 850,
        easing: 'easeInOutSine',
        delay: (el, i) => {
            return 200 + 100 * i;
        },
        complete({ animatables }) {
            removeFromElementsPropWillChange(animatables);
        },
    });
};

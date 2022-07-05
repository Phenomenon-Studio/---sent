import { EventEmitter } from '@helpers/EventEmitter';
import Popups from '@components/Popups';
import { resizer } from '@helpers/resizer';
import Navbar from '@components/UI/navbar/Navbar';
import NavbarLinkScrollTo from '@components/UI/navbar/NavbarLinkScrollTo';
import Slider from '@components/UI/slider/Slider';
import { paginationInit } from '@components/pagination';
import PostWatch from '@components/UI/postWatch/PostWatch';
import Search from '@components/UI/search/Search';
import { scrollTo } from '@helpers/animatedScrollTo';
import AnimeDetectViewport from '@components/animeDetectViewport/AnimeDetectViewport';
import { hiddenHeaderOnScroll } from '@components/UI/hiddenHeader/hiddenHeaderOnScroll';

const emitter = new EventEmitter();

// NOTE: Scroll to anchor
{
    const $anchors = document.body.querySelectorAll('[data-anchor]');

    if ($anchors.length) {
        const $header = document.body.querySelector('header') || null;
        const headHeight = $header ? $header.offsetHeight : 0;
        const $links = document.body.querySelectorAll('[data-menu] a');
        document.body.classList.add('is-scrolling');

        const href = window.location.href;
        history.pushState('', '', window.location.pathname);
        for (let i = 0; i < $anchors.length; i++) {
            if ($anchors[i].hasAttribute('id') && href.indexOf($anchors[i].id) !== -1) {
                const viewport = $anchors[i].offsetTop - headHeight;
                scrollTo(document.documentElement, viewport, 600, () => {
                    requestAnimationFrame(() => {
                        $links.forEach($link => {
                            const href = $link.href.slice($link.href.lastIndexOf('/') + 1) || null;
                            $link.classList.remove('is-active');
                            if (href && href?.replace(/#/, '') === $anchors[i].getAttribute('id')) {
                                $link.classList.add('is-active');
                            } else {
                                $link.classList.remove('is-active');
                            }
                        });
                        document.body.classList.remove('is-scrolling');
                    });
                });
                break;
            }
        }
    }
}

// NOTE: Popups
{
    const $popups = document.querySelectorAll('.popup');
    if ($popups.length) {
        const popups = new Popups($popups, {});
        popups.init();
    }
}

// NOTE: Wrap flex column
{
    const $wrapFlex = document.querySelector('[data-wrap-flex]') || null;

    if ($wrapFlex) {
        $wrapFlex.closest('.wrap__inner')?.classList.add('wrap__inner--flex');
    }
}

// NOTE: Navbar
{
    const $navbar = document.querySelector('[data-nav]') || null;

    if ($navbar) {
        new NavbarLinkScrollTo($navbar).init();

        let navbar = null;
        const mq = window.matchMedia('(max-width: 991px)');

        const checkMq = () => {
            if (mq.matches) {
                navbar?.destroy();
                navbar = new Navbar($navbar, { emitter });
                navbar.init();
            } else if (navbar !== null) {
                navbar?.destroy();
                navbar = null;
            }
        };

        checkMq();
        mq.addListener(checkMq);
    }
}

// NOTE: Slider
{
    const $sliders = document.querySelectorAll('[data-slider]');

    if ($sliders.length) {
        $sliders.forEach($slider => {
            new Slider($slider).init();
        });
    }
}

// NOTE: Slider media query
{
    const $sliders = document.querySelectorAll('[data-slider-mq]');

    if ($sliders.length) {
        $sliders.forEach($slider => {
            let swiper = null;
            const mq = window.matchMedia(`(max-width: ${$slider.dataset.sliderMq}px)`);

            const checkMq = () => {
                if (mq.matches) {
                    $slider.removeAttribute('class');
                    $slider.classList.add('swiper-container');
                    swiper = new Slider($slider);
                    swiper.init();
                } else if (swiper !== null) {
                    $slider.removeAttribute('class');
                    $slider.classList.remove('swiper-container');
                    swiper.destroy();
                    swiper = null;
                }
            };

            checkMq();
            mq.addListener(checkMq);
        });
    }
}

// NOTE: Pagination
{
    const $holder = document.querySelector('[data-pagination]') || null;

    if ($holder) {
        paginationInit($holder);
    }
}

// NOTE: Post watch
{
    const $post = document.querySelector('[data-post-watch]') || null;

    if ($post) {
        new PostWatch($post).init();

        let postWatch = null;
        const mq = window.matchMedia('(min-width: 768px)');

        const checkMq = () => {
            if (mq.matches) {
                if (postWatch !== null) {
                    postWatch.destroy();
                    postWatch = null;
                }
                postWatch = new PostWatch($post);
                postWatch.init();
            } else if (postWatch !== null) {
                postWatch.destroy();
                postWatch = null;
            }
        };

        checkMq();
        mq.addListener(checkMq);
    }
}

// NOTE: Search
{
    const $search = document.querySelector('[data-search]') || null;
    const $itemsHolder = document.querySelector('[data-items-holder]') || null;

    if ($search && $itemsHolder) {
        new Search($search, $itemsHolder).init();
    }
}

// NOTE: Main animation
{
    const $elements = document.querySelectorAll('[data-el-anime]');

    if ($elements.length) {
        const detectViewport = new AnimeDetectViewport($elements);
        detectViewport.init();
    }
}

// NOTE: hidden Header for scroll
{
    const $header = document.querySelector('header') || null;

    if ($header) {
        hiddenHeaderOnScroll($header);
    }
}

// Resize function
resizer({ emitter, ms: 300 });

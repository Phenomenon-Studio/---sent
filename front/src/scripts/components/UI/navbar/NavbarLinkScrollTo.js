import { visibleScroll } from '@helpers/utils';
import { scrollTo } from '@helpers/animatedScrollTo';

export default class NavbarLinkScrollTo {
    constructor($navbar, options = {}) {
        this.$navbar = $navbar;
        this.$menu = this.$navbar.querySelector('[data-menu]');
        this.$links = this.$menu.querySelectorAll('a');
        this.$header = document.body.querySelector('header') || null;
        this.$anchors = document.body.querySelectorAll('[data-anchor]');
        this.$toggler = this.$navbar.querySelector('[data-menu-toggler]');
        this.isScrolling = false;
        this.viewport = 0;
        this.headHeight = this.$header ? this.$header.offsetHeight : 0;
        this.handler = this.handler.bind(this);
        this.destroy = this.destroy.bind(this);
        this.scrollHandler = this.scrollHandler.bind(this);
        this.observes = [];
    }

    init() {
        this.$navbar.addEventListener('click', this.handler);
        window.addEventListener('scroll', this.scrollHandler, false);
    }

    handler(e) {
        const $target = e.target.closest('a') || null;

        if ($target) {
            const href = $target.href.slice($target.href.lastIndexOf('/') + 1) || null;
            const $element = href ? document.body.querySelector(href) : null;

            if ($element) {
                e.preventDefault();

                this.viewport = $element.offsetTop - this.headHeight;

                this.isScrolling = true;

                this.$links.forEach($link => $link.classList.remove('is-active'));
                $target.classList.add('is-active');

                if (this.$menu.classList.contains('is-active')) {
                    visibleScroll();
                    this.$menu.classList.remove('is-active');
                    this.$toggler.classList.remove('is-active');
                    scrollTo(document.documentElement, this.viewport, 600, () => {
                        requestAnimationFrame(() => {
                            this.isScrolling = false;
                            $target.classList.add('is-active');
                        });
                    });
                } else {
                    scrollTo(document.documentElement, this.viewport, 600, () => {
                        requestAnimationFrame(() => {
                            this.isScrolling = false;
                            $target.classList.add('is-active');
                        });
                    });
                }
            }
        }
    }

    scrollHandler() {
        this.$anchors.forEach($anchor => {
            const { top } = $anchor.getBoundingClientRect();

            if (
                top < this.headHeight * 1.1 &&
                top + $anchor.offsetHeight > this.headHeight * 0.8 &&
                !this.isScrolling
            ) {
                this.$links.forEach($link => {
                    const href = $link.href.slice($link.href.lastIndexOf('/') + 1) || null;
                    $link.classList.remove('is-active');
                    if (href && href?.replace(/#/, '') === $anchor.getAttribute('id')) {
                        $link.classList.add('is-active');
                    } else {
                        $link.classList.remove('is-active');
                    }
                });
            }
        });
    }

    destroy() {
        this.isScrolling = false;
        this.observes.forEach(observe => observe());
        this.$navbar.removeEventListener('click', this.handler);
        window.removeEventListener('scroll', this.scrollHandler, false);
    }
}

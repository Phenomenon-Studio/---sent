import 'swiped-events';
import { hiddenScroll, visibleScroll, getViewportHeight } from '@helpers/utils';

export default class Navbar {
    constructor($navbar, options = {}) {
        this.$navbar = $navbar;
        this.$menu = this.$navbar.querySelector('[data-menu]');
        this.$toggler = this.$navbar.querySelector('[data-menu-toggler]');
        this.options = options;
        this.emitter = this.options.emitter;
        this.handler = this.handler.bind(this);
        this.handlerClose = this.handlerClose.bind(this);
        this.handleResize = this.handleResize.bind(this);
        this.handleSwipedDown = this.handleSwipedDown.bind(this);
        this.handleTouchStart = this.handleTouchStart.bind(this);
    }

    init() {
        this.$navbar.removeEventListener('click', this.handler);
        this.$navbar.addEventListener('click', this.handler);
        document.body.addEventListener('click', this.handlerClose);
        document.body.addEventListener('touchstart', this.handleTouchStart);
        this.$menu.addEventListener('swiped-down', this.handleSwipedDown);
        this.handleResize();
        this.emitter.on('page:resized', this.handleResize);
    }

    handler(e) {
        const $toggler = e.target.closest('[data-menu-toggler]') || null;

        if ($toggler) {
            $toggler.classList.toggle('is-active');
            this.$menu.classList.toggle('is-active');
            this.$menu.classList.contains('is-active') ? hiddenScroll() : visibleScroll();
        }
    }

    handlerClose(e) {
        const $target = e.target.closest('[data-menu-toggler]') || e.target.closest('[data-menu]');

        if ($target) {
            return false;
        } else if (document.documentElement.classList.contains('no-scroll')) {
            this.$toggler.classList.remove('is-active');
            this.$menu.classList.remove('is-active');
            visibleScroll();
        }
    }

    handleTouchStart(e) {
        if (e.touches.length != 1) {
            return;
        }
        window.pageYOffset == 0;
    }

    handleSwipedDown(e) {
        const $menu = e.target.closest('[data-menu]') || null;

        if ($menu && $menu.classList.contains('is-active')) {
            e.preventDefault();
            this.$menu.classList.remove('is-active');
            this.$toggler.classList.remove('is-active');
            visibleScroll();
            return;
        }
    }

    handleResize() {
        getViewportHeight();
    }

    destroy() {
        visibleScroll();
        this.$menu.classList.remove('is-active');
        this.$toggler.classList.remove('is-active');
        this.$navbar.removeEventListener('click', this.handler);
        this.$menu.removeEventListener('swiped-down', this.handleSwipedDown);
        document.body.removeEventListener('click', this.handlerClose);
        this.emitter.off('page:resized', this.handleResize);
    }
}

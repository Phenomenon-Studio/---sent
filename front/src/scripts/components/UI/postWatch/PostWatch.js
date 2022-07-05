import { useIntersectionObserver } from '@helpers/utils';
import { scrollTo } from '@helpers/animatedScrollTo';

export default class PostWatch {
    constructor($post) {
        this.$post = $post;
        this.$themes = this.$post.querySelectorAll('[data-theme]');
        this.$links = this.$post.querySelectorAll('[data-link]');
        this.observeThemes = this.observeThemes.bind(this);
        this.handleScrollTo = this.handleScrollTo.bind(this);
        this.destroy = this.destroy.bind(this);
        this.observes = [];
    }

    init() {
        this.observeThemes();
        this.$post.addEventListener('click', this.handleScrollTo);
    }

    observeThemes() {
        this.$themes.forEach($theme => {
            this.observes.push(
                useIntersectionObserver(
                    $theme,
                    target => {
                        if (target.isIntersecting && !this.$post.classList.contains('is-scrolling')) {
                            const $target = target.target;
                            const name = $target.closest('[data-theme]').getAttribute('data-theme');

                            this.$links.forEach($link => {
                                $link.classList.remove('is-active');
                                if ($link.getAttribute('data-link') === name) {
                                    $link.classList.add('is-active');
                                } else {
                                    $link.classList.remove('is-active');
                                }
                            });
                        }
                    },
                    { threshold: [0.5] }
                )
            );
        });
    }

    handleScrollTo(e) {
        const $target = e.target.closest('[data-link]') || null;

        if ($target) {
            e.preventDefault();

            const name = $target.getAttribute('data-link');
            const $theme =
                [...this.$themes].find(item => item.getAttribute('id') && item.getAttribute('data-theme') === name) ||
                null;

            if ($theme) {
                this.$links.forEach($link => {
                    if ($link !== $target) {
                        $link.classList.remove('is-active');
                    }
                });

                $target.classList.add('is-active');
                this.$post.classList.add('is-scrolling');
                const viewport = $theme.offsetTop - 120;
                scrollTo(document.documentElement, viewport, 600, () => {
                    requestAnimationFrame(() => {
                        this.$post.classList.remove('is-scrolling');
                        $target.classList.add('is-active');
                    });
                });
            }
        }
    }

    destroy() {
        this.$post.classList.remove('is-scrolling');
        this.observes.forEach(observe => observe());
        this.$post.removeEventListener('click', this.handleScrollTo);
    }
}

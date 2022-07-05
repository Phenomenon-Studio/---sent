export const hiddenHeaderOnScroll = $header => {
    let scrollTopOldValue = 0;
    window.addEventListener(
        'scroll',
        () => {
            if (window.pageYOffset <= scrollTopOldValue) {
                $header.classList.remove('is-hide-header');
            } else {
                $header.classList.add('is-hide-header');
            }
            scrollTopOldValue = window.pageYOffset;
        },
        false
    );
};

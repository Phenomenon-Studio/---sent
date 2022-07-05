export const navigation = $slider => ({
    prevEl: $slider.closest('[data-slider-wrap]')?.querySelector('[data-slider-button-prev]'),
    nextEl: $slider.closest('[data-slider-wrap]')?.querySelector('[data-slider-button-next]'),
});

export const pagination = $slider => {
    const $pagination = $slider.closest('[data-slider-wrap]')?.querySelector('[data-slider-pagination]') || null;

    if ($pagination) {
        if ($pagination.getAttribute('data-slider-pagination') === 'custom') {
            return {
                el: $pagination,
                clickable: true,
                renderBullet: (index, className) => {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },
            };
        } else {
            return {
                el: $pagination,
                clickable: true,
            };
        }
    }

    return {};
};

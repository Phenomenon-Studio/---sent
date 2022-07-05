import { prependChild } from '@helpers/utils';

export const paginationInit = $holder => {
    const $items = $holder.querySelectorAll('ul.page-numbers > li');

    $items.forEach($item => {
        const $prev = $item.querySelector('.prev') || null;
        const $next = $item.querySelector('.next') || null;

        if ($prev) {
            prependChild($holder, $prev);
        }

        if ($next) {
            $holder.appendChild($next);
        }
    });
};

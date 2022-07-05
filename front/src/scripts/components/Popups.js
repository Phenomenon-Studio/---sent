import { hiddenScroll, visibleScroll } from '@helpers/utils';

export default class Popups {
    constructor($popups, options) {
        this.$popups = $popups;
    }

    init() {
        window.addEventListener('load', () => {
            [...this.$popups].forEach(popup => {
                popup.removeAttribute('style');
            });
        });
        document.body.addEventListener('click', e => this._delegation(e));
    }

    _delegation(e) {
        let target = e.target;
        if (target.correspondingUseElement) {
            target = target.correspondingUseElement;
        }
        const el = target.closest('[data-popup-open]') || target.closest('[data-popup-close]');
        if (!el) return;
        e.preventDefault();
        const openedPopup = document.querySelector('.js-popup-opened');
        const elDataset = el.dataset;
        if ('popupClose' in elDataset) {
            visibleScroll();
            openedPopup && openedPopup.classList.remove('js-popup-opened');
        } else if ('popupOpen' in elDataset) {
            hiddenScroll();
            document.getElementById(`${elDataset.popup}`).classList.add('js-popup-opened');
        }
    }
}

import { api, generateCancelRequest } from '@helpers/axios';
import { filterSearchParams } from '@components/UI/search/search.functions';
import { paginationInit } from '@components/pagination';
import { TYPE_RADIO, TYPE_CHECKBOX } from '@components/UI/search/search.constants';
import { warn, spinner, sleep } from '@helpers/utils';
import { TEXT_ERROR_MESSAGE } from '@helpers/constants';

export default class Search {
    constructor($search, $itemsHolder) {
        this.$search = $search;
        this.$itemsHolder = $itemsHolder;
        this.searchParams = new URLSearchParams(location.search);
        this.changeHandler = this.changeHandler.bind(this);
        this.inputHandler = this.inputHandler.bind(this);
        this.requestCancel = { cancel: null };
        this.params = [];
        this.searchParamsString = '';
    }

    init() {
        this.$search.addEventListener('change', this.changeHandler);
        this.$search.addEventListener('input', this.inputHandler);

        for (const [key, value] of this.searchParams.entries()) {
            this.params.push({
                [key]: value,
            });
        }
    }

    inputHandler(e) {
        const isTarget = ['INPUT', 'TEXTAREA'].includes(e.target.nodeName);

        if (isTarget && ![TYPE_RADIO, TYPE_CHECKBOX].includes(e.target.type)) {
            const $target = e.target;
            const { name, value } = $target;

            const currentItem = this.params.find(item => item[name] === value) || null;

            if (currentItem || !this.params.length) {
                this.params.push({
                    [name]: value,
                });
            } else {
                this.params.forEach(item => {
                    Object.keys(item).forEach(key => {
                        if (key === 'search') {
                            item[name] = value;
                        }
                    });
                });
            }
            this.searchParamsString = filterSearchParams(this.params, 'pushState');
        }
    }

    async changeHandler(e) {
        const isTarget = [TYPE_RADIO, TYPE_CHECKBOX].includes(e.target.type);

        if (isTarget) {
            e.preventDefault();
            const $target = e.target;
            const { type, checked, name, value } = $target;

            if (type === TYPE_CHECKBOX) {
                if (checked) {
                    const currentItem = this.params.find(item => item[name] === value) || null;

                    if (!currentItem) {
                        this.params.push({
                            [name]: value,
                        });
                        this.searchParamsString = filterSearchParams(this.params, 'pushState');
                    }
                } else {
                    const params = this.params.filter(item => item[name] !== value);
                    this.params = params;
                    this.searchParamsString = filterSearchParams(this.params, 'pushState');
                }
                const { cancelToken, isCancel } = generateCancelRequest(this.requestCancel);

                this.$search.classList.add('not-allowed');

                try {
                    const { status, data } = await api.get(
                        `${window.location.pathname}/?get_posts_by_query=1&${this.searchParamsString}`,
                        { cancelToken }
                    );

                    this.$itemsHolder.innerHTML = spinner;

                    if (status === 200) {
                        await sleep(200);
                        this.$itemsHolder.innerHTML = data;
                        const $pagination = this.$itemsHolder.querySelector('[data-pagination]') || null;

                        if ($pagination) {
                            paginationInit($pagination);
                        }

                        this.$search.classList.remove('not-allowed');
                    }
                } catch (error) {
                    if (isCancel(error)) {
                        return;
                    }
                    warn(error.message);
                    const { status, statusText } = error;
                    const errorStatusText = status && statusText ? `status: ${status} ${statusText}` : '';
                    alert(`${TEXT_ERROR_MESSAGE}\n${errorStatusText}`);
                    this.$search.classList.remove('not-allowed');
                }
            }
        }
    }

    destroy() {
        this.$search.removeEventListener('input', this.inputHandler);
        this.$search.removeEventListener('change', this.changeHandler);
    }
}

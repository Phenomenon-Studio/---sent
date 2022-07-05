import { debounce } from '@helpers/utils';

const resize = emitter => {
    emitter.emit('page:resized', [document.documentElement.clientWidth, document.documentElement.clientHeight]);
};

export const resizer = options => {
    const debouncedResize = debounce(resize.bind(null, options.emitter), options.ms);

    window.addEventListener('resize', debouncedResize, false);

    return () => {
        window.removeEventListener('resize', debouncedResize);
    };
};

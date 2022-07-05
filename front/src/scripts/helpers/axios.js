import axios from 'axios';

const generateCancelRequest = req => {
    if (req.cancel) {
        req.cancel();
        req.cancel = null;
    }

    const source = axios.CancelToken.source();
    req.cancel = source.cancel;

    return {
        cancelToken: source.token,
        isCancel: axios.isCancel,
    };
};

const api = axios.create({
    baseURL: '/',
});

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.get['Content-Type'] = 'application/x-www-form-urlencoded';

export { api, generateCancelRequest };

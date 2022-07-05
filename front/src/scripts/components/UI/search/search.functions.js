export const filterSearchParams = (data = [], method = false) => {
    const searchParams = new URLSearchParams();

    data.forEach(item => {
        Object.keys(item).forEach(key => {
            searchParams.append(key, item[key]);

            method === 'pushState' ? history.pushState('', '', `?${searchParams.toString()}`) : false;
        });
    });

    return searchParams.toString();
};

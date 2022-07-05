export const scrollTo = (element, to, duration, callback) => {
    const start = element.scrollTop;
    const change = to - start;
    const startDate = Date.now();

    //NOTE: t = current time
    //NOTE: b = start value
    //NOTE: c = change in value
    //NOTE: d = duration

    const easeInOutQuad = (t, b, c, d) => {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    };

    const animateScroll = () => {
        const currentDate = Date.now();
        const currentTime = currentDate - startDate;
        element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
        if (currentTime < duration) {
            requestAnimationFrame(animateScroll);
        } else {
            element.scrollTop = to;

            if (typeof callback === 'function') {
                callback();
            }
        }
    };
    animateScroll();
};

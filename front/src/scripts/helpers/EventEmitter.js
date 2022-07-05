export class EventEmitter {
    constructor() {
        this.events = {};
    }

    _getEventListByName(eventName) {
        if (typeof this.events[eventName] === 'undefined') {
            this.events[eventName] = new Set();
        }
        return this.events[eventName];
    }

    on(eventName, fn) {
        this._getEventListByName(eventName).add(fn);
    }

    once(eventName, fn) {
        const onceFn = (...args) => {
            this.off(eventName, onceFn);
            fn(...args);
        };
        this.on(eventName, onceFn);
    }

    emit(eventName, ...args) {
        this._getEventListByName(eventName).forEach(fn => fn(...args));
    }

    off(eventName, fn) {
        this._getEventListByName(eventName).delete(fn);
    }
}

(function() {
    var totalClickInteractions = 0;
    var totalKeybdInteractions = 0;
    var startTime = new Date().getTime();

    // REGION: Setup XHR Hooks
    const xhrSend = XMLHttpRequest.prototype.send;
    const xhrOpen = XMLHttpRequest.prototype.open;

    XMLHttpRequest.prototype.open = function(method, url) {
        this._url = url;
        return xhrOpen.apply(this, arguments);
    }

    XMLHttpRequest.prototype.send = function(body) {
        if (!this._url.endsWith('/submit'))
            return xhrSend.apply(this, arguments);
        
        if (typeof body === 'string') {
            body = JSON.parse(body);
            body.click_int = totalClickInteractions;
            body.keybd_int = totalKeybdInteractions;
            body.time_taken = new Date().getTime() - startTime;

            return xhrSend.apply(this, [JSON.stringify(body)]);
        }

        if (body.append) {
            body.append('click_int', totalClickInteractions);
            body.append('keybd_int', totalKeybdInteractions);
            body.append('time_taken', new Date().getTime() - startTime);

            return xhrSend.apply(this, [body]);
        }

        alert('Unable to hook unknown payload (check console for more info)');
        console.error('Failed to modify unknown payload: ', typeof body, body);

        return xhrSend.apply(this, arguments);
    }

    // REGION: Add DOM handlers
    window.addEventListener('click', () => {
        console.debug('Click interaction');
        totalClickInteractions++;
    });

    window.addEventListener('keypress', () => {
        console.debug('Keyboard interaction');
        totalKeybdInteractions++;
    });

    function send30SecondMark() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/mark');
        xhr.send();
    }

    setInterval(send30SecondMark, 30 * 1000);
})();
document.addEventListener('DOMContentLoaded', function () {
    const webSiteId = document.body.getAttribute('data-web-site-id');

    document.addEventListener('click', function (event) {
        const clickData = {
            web_site_id: webSiteId,
            url: window.location.href,
            x: event.clientX,
            y: event.clientY,
            window_width: window.innerWidth,
            window_height: window.innerHeight,
            document_width: document.documentElement.scrollWidth,
            document_height: document.documentElement.scrollHeight,
            timestamp: Math.floor(Date.now() / 1000)
        };

        fetch('http://127.0.0.1:8000/api/clicks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(clickData),
        })
            .then(response => response.json())
            .then(data => console.log('Данные отправлены:', data))
            .catch(error => console.error('Ошибка:', error));
    });
});

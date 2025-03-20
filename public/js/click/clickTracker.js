 function startTracking(webSiteId) {
    document.addEventListener('click', function (event) {
        const clickData = {
            x: event.pageX,
            y: event.pageY,
            url: window.location.href,
            web_sites_id: webSiteId,
            window_width: window.innerWidth,
            window_height: window.innerHeight,
            document_width: document.documentElement.scrollWidth,
            document_height: document.documentElement.scrollHeight
        };

        fetch('http://127.0.0.1:8000/api/clicks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(clickData)
        })
            .then(response => response.json())
            .then(data => console.log("Ответ сервера:", data))
            .catch(error => console.error("Ошибка:", error));
    });
}

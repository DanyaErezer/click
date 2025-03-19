document.addEventListener('click', function(event) {
    const clickData = {
        webSite_id: webSiteID,
        url: window.location.href,
        x: event.clientX,
        y: event.clientY,
        window_width: window.innerWidth,
        window_height: window.innerHeight,
        document_width: document.documentElement.scrollWidth,
        document_height: document.documentElement.scrollHeight,
    };

    fetch('http://localhost:8000/api/clicks', {
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

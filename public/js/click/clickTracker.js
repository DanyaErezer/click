//С JS практически не работал, поэтому просто вставляю код из deepseek.
document.addEventListener('click', function(event) {
    // Собираем данные о клике
    const clickData = {
        date: new Date().toISOString(), // Дата и время клика
        x: event.clientX,              // Координата X клика
        y: event.clientY,              // Координата Y клика
        url: window.location.href,     // URL страницы, где произошел клик
    };

    // Отправляем данные на сервер
    fetch('https://localhost:8000/api/clicks', {
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

@extends('layouts.app')

@section('title', 'Главная страница')

@section('main_content')
    <script>
        document.addEventListener('click', function(event) {
            const clickData = {
                url: window.location.href,
                date: new Date().toISOString(),
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
    </script>

@endsection

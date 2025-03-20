@extends('layouts.app')

@section('title', 'Клики')

@section('main_content')
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="heatmap" style="width: 100%; height: 800px;"></div>
<script src="https://cdn.jsdelivr.net/npm/heatmap.js"></script>
<div id="heatmap" style="width: 100%; height: 100vh; position: relative;"></div>

<script>
    const heatmap = h337.create({
        container: document.getElementById('heatmap'),
        radius: 15, // Размер пятен кликов
    });

    const data = @json($click);

    // Получаем размеры окна пользователя и документа
    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;

    const points = data.map(click => {
        // Масштабируем координаты под текущее разрешение экрана
        const scaleX = windowWidth / click.window_width;
        const scaleY = windowHeight / click.window_height;

        return {
            x: Math.round(click.x * scaleX),
            y: Math.round(click.y * scaleY),
            value: 1,
        };
    });

    heatmap.setData({
        max: 50,
        data: points,
    });
</script>


</body>
</html>
@endsection

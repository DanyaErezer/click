@extends('layouts.app')

@section('title', 'Клики')

@section('main_content')
<script src="https://cdn.jsdelivr.net/npm/heatmap.js"></script>
<div id="heatmap" style="width: 100%; height: 100vh; position: relative;"></div>

<script>
    const heatmap = h337.create({
        container: document.getElementById('heatmap'),
        radius: 15, // Размер пятен кликов
    });

    const data = @json($clicks);
    console.log("Полученные клики:", data);


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


@endsection

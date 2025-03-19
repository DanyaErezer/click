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
<script>
    const heatmap = h337.create({
        container: document.getElementById('heatmap'),
    });

    // Предположим, что data приходит с серверной части
    const data = @json($click);

    // Получаем размеры окна и документа
    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;
    const documentWidth = document.documentElement.scrollWidth;
    const documentHeight = document.documentElement.scrollHeight;

    // Нормализуем данные относительно документа
    const points = data.map(click => {
        // Нормализуем координаты на основе размеров документа
        const normalizedX = click.x / documentWidth * 100; // нормализуем x координату
        const normalizedY = click.y / documentHeight * 100; // нормализуем y координату

        return {
            x: normalizedX * documentWidth,  // Преобразуем обратно в реальные координаты
            y: normalizedY * documentHeight, // Преобразуем обратно в реальные координаты
            value: 1,  // Можно регулировать интенсивность клика
        };
    });

    // Устанавливаем данные для heatmap
    heatmap.setData({
        max: 10, // Максимальное значение для отображения
        data: points, // Точки данных
    });

</script>

</body>
</html>
@endsection

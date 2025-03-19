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
    const data = @json($click);
    const points = data.map(click => ({
        x: click.x,
        y: click.y,
        value: 1,
    }));
    heatmap.setData({
        max: 10,
        data: points,
    });
</script>

</body>
</html>
@endsection

@extends('layouts.app')

@section('title', 'Клики')

@section('main_content')
<script src="https://cdn.jsdelivr.net/npm/heatmap.js"></script>
<div id="heatmap" style="width: 100%; height: 100vh; position: relative;"></div>

<script>
    const heatmap = h337.create({
        container: document.getElementById('heatmap'),
        radius: 20,
    });

    const data = @json($website->clicks);
    console.log("Полученные клики:", data);


    const windowWidth = window.innerWidth;
    const windowHeight = window.innerHeight;

    const points = data.map(click => {
        const scaleX = windowWidth / click.window_width;
        const scaleY = windowHeight / click.window_height;

        return {
            x: Math.round(click.x * scaleX),
            y: Math.round(click.y * scaleY),
            value: 1,
        };
    });

    heatmap.setData({
        max: 30,
        data: points,
    });
</script>


@endsection

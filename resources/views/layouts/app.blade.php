<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="/webSites" class="nav-link">Список сайтов</a></li>
            <li class="nav-item"><a href="/webSites/create" class="nav-link">Добавить сайт</a></li>
            <li class="nav-item"><a href="/heatmap" class="nav-link">Heatmap</a></li>
            <li class="nav-item"><a href="/test" class="nav-link">Тест кликов</a></li>
            <li class="nav-item"><a href="/chart" class="nav-link">Статистика</a></li>
        </ul>
    </header>
</div>
@yield('main_content')

</body>
</html>

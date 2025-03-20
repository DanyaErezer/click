@extends('layouts.app')

@section('title', 'Главная страница')

@section('main_content')
    <div>
        <h1>Как это работает)</h1>
        <h2>Я использовал SQLite, поэтому просто используй миграции и сидеры</h2>
        <h2>Для того, чтобы сайт отслеживался нужно добавить два скрипта:</h2>
        <h3>
            1. Подключение скрипта обработки кликов -
            <pre>&lt;script src="{{ asset('js/click/clickTracker.js') }}"&gt;&lt;/script&gt;</pre>
            2. Подключение ключа скрипта с id вашего созданного сайта -
            <pre>&lt;script&gt;startTracking(id-вашего сайта)&lt;/script&gt;</pre>
        </h3>

    </div>

@endsection

@extends('layouts.app')

@section('title', 'Домашняя страница')

@section('main_content')
    <h1>Список сайтов</h1>
    <a href="{{ route('webSites.create') }}" class="btn btn-success">Добавить сайт</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>URL</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($webSites as $webSite)
            <tr>
                <td>{{ $webSite->id }}</td>
                <td>{{ $webSite->name }}</td>
                <td>{{ $webSite->url }}</td>
                <td>
                    <a href="{{ route('click', $webSite->id)}}" class="btn btn-warning">Клик</a>
                    <a href="{{ route('heatmap', $webSite->id) }}" class="btn btn-primary">Показать клики</a>
                    <a href="{{ route('chart', $webSite->id) }}" class="btn btn-success">Показать статистику</a>
                    <a href="{{ route('webSites.edit', $webSite->id) }}" class="btn btn-info">Редактировать</a>
                    <form action="{{ route('webSites.destroy', $webSite->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>


                    </form>
                </td>
            </tr>
        @endforeach
        <script src="{{ asset('js/click/clickTracker.js') }}"></script>
        <script>startTracking(3)</script>
        </tbody>
    </table>
@endsection

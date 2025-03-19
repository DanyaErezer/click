@extends('layouts.app')

@section('title', 'Добавить сайт')

@section('main_content')
    <h1>Добавить сайт</h1>
    <form action="{{ route('webSites.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection

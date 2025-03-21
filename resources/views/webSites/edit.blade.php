@extends('layouts.app')

@section('title', 'Изменить сайт')

@section('main_content')
    <h1>Редактировать сайт</h1>
    <form action="{{ route('webSites.update', $webSite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $webSite->name }}" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $webSite->url }}" required>
        </div>
        @if($errors->any())
            <div style="color:red;">{{$errors}}</div>
        @endif
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection

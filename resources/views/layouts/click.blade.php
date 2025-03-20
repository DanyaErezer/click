@extends('layouts.app')

@section('title', 'Клики')

@section('main_content')


    <script src="{{ asset('js/click/clickTracker.js') }}"></script>
    <script>startTracking({{ $webSite->id }})</script>


@endsection

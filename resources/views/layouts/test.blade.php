@extends('layouts.app')

@section('title', 'Клики')

@section('main_content')


    <body></body>
    <script src="{{ asset('js/click/clickTracker.js') }}"></script>
    <script>startTracking({{ $test->id }})</script>


@endsection

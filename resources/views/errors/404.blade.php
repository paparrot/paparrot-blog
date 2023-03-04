@extends('layouts.error')

@section('title', 'Page not found')


@section('content')
    <div class="text-center">
        <h1>Sorry, page not found</h1>
        <a title="Home" href="{{ route('home') }}" class="text-indigo-600">
            Back to homepage
        </a>
    </div>
@endsection

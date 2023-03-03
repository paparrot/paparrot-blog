@extends('layouts.main')

@section('title', 'About me')

@section('content')
    <h1 class="mb-5">{{ $page->title }}</h1>
    <p>{{ $page->description }}</p>
    {!! $page->body  !!}
@endsection

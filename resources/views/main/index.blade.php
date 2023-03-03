@extends('layouts.main')

@section('title', 'Main')

@section('content')
    @include('components.hero')
    @include('components.latest-blog')
    @include('components.latest-projects')
    @include('components.contacts')
@endsection

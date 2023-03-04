@extends('layouts.main')

@section('title', 'Main')

@section('content')
    @include('components.hero')
    @include('components.latest-blog', ['articles' => $articles])
    @include('components.latest-projects', ['projects' => $projects])
    @include('components.contacts')
@endsection

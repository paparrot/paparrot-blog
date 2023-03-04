@extends('layouts.main')

@section('title', $article->seo_title ?? $article->title)
@section('description', $article->seo_description)
@section('keywords', $article->seo_keywords)


@section('content')
    <section class="body-font">
        <div class="xl:w-2/3 mx-auto">
            @if(count($article->getMedia()) > 0)
            <img
                alt="content"
                class="aspect-video rounded-lg w-rounded-lg object-cover object-center h-full w-full"
                src="{{ $article->getMedia()[0]->getUrl() }}"
            >
            @endif
            <div>
                <div class="py-6">
                    <h1>{{ $article->title }}</h1>
                    <a href="{{ route('articles.list') }}?category={{$article->category?->slug}}" class="text-indigo-500 dark:text-indigo-400 font-bold">{{ $article->category?->title }}</a>
                    <p>{{ $article->description }}</p>
                    <hr>
                </div>
                <div class="mt-4 pt-4 sm:mt-0 sm:text-left">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </section>
@endsection

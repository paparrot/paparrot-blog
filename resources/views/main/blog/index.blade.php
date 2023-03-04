@extends('layouts.main')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>
    <section class="body-font overflow-hidden">
        <div class="container pt-12 pb-24 mx-auto">
            <div class="-my-8 mb-4 divide-y-2 divide-gray-100">
                @foreach($articles as $article)
                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <a
                                title="{{ $article->category?->title }}"
                                class="text-indigo-500"
                                href="{{ route('articles.list') }}?category={{ $article->category?->slug }}">
                                <span class="font-semibold title-font">{{ $article->category?->title }}</span>
                            </a>
                            <span class="mt-1 text-sm">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium title-font mb-2">{{ $article->title }}</h2>
                            <p class="leading-relaxed">{{ $article->description }}</p>
                            <a
                                title="{{ $article->title }}"
                                href="{{ route('articles.show', ['article' => $article]) }}"
                                class="text-indigo-500 inline-flex items-center mt-4">Read more
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
@endsection

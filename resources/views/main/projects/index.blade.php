@extends('layouts.main')

@section('title', 'Projects')

@section('content')
    <section class=" body-font">
        <h1>Projects</h1>
        <div class="container pt-12 pb-24 mx-auto">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mb-4">
                @foreach($projects as $project)
                    <div class="card flex flex-col p-6">
                        @if(count($project->getMedia()) > 0)
                            <img class="rounded lg:h-48 md:h-36 w-full object-cover object-center"
                                 src="{{ $project->getMedia()[0]?->original_url }}" alt="blog">
                        @else
                            <div
                                class="rounded flex items-center justify-center bg-gradient-to-tr from-indigo-700 to-indigo-400 text-white text-2xl font-bold lg:h-48 md:h-36 w-full object-cover object-center px-4 text-center">
                                {{ $project->title }}
                            </div>
                        @endif
                        <h1 class="mt-5 title-font text-lg font-medium  mb-3">{{ $project->title }}</h1>
                        <p class="leading-relaxed mb-3">{{ $project->description }}</p>
                        <div class="mt-auto mb-0 flex items-center flex-wrap ">
                            <a href="{{ route('projects.show', ['project' => $project]) }}"
                               class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                     stroke-width="2" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
{{--                            <span--}}
{{--                                class=" mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">--}}
{{--                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"--}}
{{--                                     stroke-linecap="round"--}}
{{--                                     stroke-linejoin="round" viewBox="0 0 24 24">--}}
{{--                                          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>--}}
{{--                                          <circle cx="12" cy="12" r="3"></circle>--}}
{{--                                </svg>1.2K--}}
{{--                            </span>--}}
{{--                            <span class=" inline-flex items-center leading-none text-sm">--}}
{{--                                        <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"--}}
{{--                                             stroke-linecap="round"--}}
{{--                                             stroke-linejoin="round" viewBox="0 0 24 24">--}}
{{--                                          <path--}}
{{--                                              d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>--}}
{{--                                        </svg>6--}}
{{--                            </span>--}}
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $projects->links() }}
        </div>
    </section>
@endsection

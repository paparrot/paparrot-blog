@extends('layouts.main')

@section('title', $project->title)


@section('content')
    <section class="body-font">
        <div class="xl:w-2/3 mx-auto">
            @if(count($project->getMedia()) > 0)
                <img
                    alt="content"
                    class="aspect-video rounded-lg w-rounded-lg object-cover object-center h-full w-full"
                    src="{{ $project->getMedia()[0]->getUrl() }}"
                />
            @endif
            <div>
                <div class="py-6">
                    <h1>{{ $project->title }}</h1>
                    <p>{{ $project->description }}</p>
                    <hr>
                </div>
                <div class="mt-4 pt-4 sm:mt-0 sm:text-left">
                    {!! $project->body !!}
                </div>
            </div>
        </div>
    </section>
@endsection

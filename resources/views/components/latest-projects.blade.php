@php use Illuminate\Support\Str; @endphp
<section class=" body-font ">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h2 class="font-medium title-font mb-2 dark:text-white">My projects</h2>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed  text-opacity-90">This is projects that i grow</p>
        </div>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach($projects as $project)
                <div class="card flex flex-col bg-opacity-40 p-6 rounded-lg">
                        @if(count($project->getMedia()) > 0)
                            <img class="rounded w-full object-cover object-center mb-6"
                                 src="{{ $project->getMedia()[0]?->original_url }}" alt="content">
                        @else
                            <div
                                class="
                                 w-full aspect-video
                                flex items-center justify-center bg-gradient-to-tr from-indigo-700 to-indigo-400 text-white text-2xl rounded font-bold object-cover object-center text-center px-4 mb-6">
                                {{ $project->title }}
                            </div>
                        @endif
                            <h2 class="text-lg dark:text-white font-bold title-font">{{ $project->title }}</h2>
                            <p class="leading-relaxed text-base">
                                {{ Str::limit($project->description) }}
                            </p>
                            <a
                                title="{{ $project->title }}"
                                class="mt-auto mb-0 text-lg flex items-center text-indigo-600 dark:text-indigo-400"
                               href="{{ route('projects.show', ['project' => $project]) }}">
                                Learn more
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                     stroke-width="2" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


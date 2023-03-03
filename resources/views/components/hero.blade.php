@php use Illuminate\Support\Facades\Vite; @endphp
<section class="body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
            <img class="object-cover object-center rounded" alt="hero" src="{{ Vite::asset('resources/images/hero.webp') }}">
        </div>
        <div
            class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font mb-4">Hey there! 👋
                <br class="hidden lg:inline-block">My name is Klim
            </h1>
            <p>I'm a full stack web developer based in Podgorica, Montenegro.</p>
            <p class="mb-8 leading-relaxed">I have a strong experience with building web applications using Laravel and
                Vue.js</p>
            <div class="flex justify-center">
                <a
                    href="https://www.linkedin.com/in/klim-subbotin/"
                    target="_blank"
                    rel="noreferrer noopener"
                    class="btn"
                >
                    Linkedin
                </a>
                <a
                    class="btn btn-primary ml-4">
                    Resume
                </a>
            </div>
        </div>
    </div>
</section>

<header class=" body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a title="Homepage" href="{{ route('home') }}" class="flex title-font font-medium items-center text-base dark:text-white mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                 viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Paparrot</span>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
            <a title="About" href="{{ route('page.show', ['page' => 'about']) }}" class="mr-5">About</a>
            <a title="Projects" href="{{ route('projects.list') }}" class="mr-5">Projects</a>
            <a title="Blog" href="{{ route('articles.list') }}" class="mr-5">Blog</a>
            <a title="Contacts" href="{{ route('contacts.index') }}" class="mr-5">Contacts</a>
        </nav>
        <a
            title="Contacts"
            href="{{ route('contacts.index') }}"
            class="btn btn-primary hidden md:block flex items-center gap-1">
            Contact
        </a>
    </div>
</header>

<section class="body-font relative">
    <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 dark:bg-gray-800 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=Podgorica&ie=UTF8&t=&z=14&iwloc=B&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
            <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                <div class="lg:w-1/2 px-6">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                    <p class="mt-1 dark:text-gray-900">Podgorica, Montenegro</p>
                </div>
                <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                    <a
                        href="mailto:subbotin.klim@gmail.com"
                        title="subbotin.klim@gmail.com"
                        class="text-indigo-500 leading-relaxed"
                    >subbotin.klim@gmail.com</a>
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                    <p class="leading-relaxed dark:text-gray-900">+382 (068) 480-564</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 card md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
            <h2 class="text-lg mb-1 font-medium title-font">Feedback</h2>
            <p class="leading-relaxed">Lets work together!</p>
            <form action="{{ route('contacts.submit') }}" method="POST">
                @csrf
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full bg-white dark:bg-slate-700 dark:border-gray-700 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @error('name')
                        @foreach($errors->get('name') as $message)
                            <p class="text-red-500">{{ $message }}</p>
                        @endforeach
                    @enderror
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm">Email</label>
                    <input
                        type="text"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full bg-white dark:bg-slate-700 dark:border-gray-700 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    >
                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm">Message</label>
                    <textarea
                        id="message"
                        name="message"
                        class="w-full bg-white dark:bg-slate-700 dark:border-gray-700 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                    >{{ old('message') }}</textarea>
                    @error('message')

                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary block text-center">Submit</button>
            </form>
        </div>
    </div>
</section>

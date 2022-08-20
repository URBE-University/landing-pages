<nav class="max-w-7xl mx-auto border-b md:border-b-0">
    <div class="w-full flex items-center justify-between py-8 px-4 sm:px-6 lg:px-8">
        <img src="{{ asset('urbe-logo.svg') }}" alt="" class="w-24 md:w-36">

        <div class="flex items-center space-x-3">
            <p class="hidden sm:block text-normal text-slate-600">{{__("We are here to help!")}}</p>
            <a href="tel:+{{ ($alt_phone ?? '1.844.744.8723') }}" class="font-bold text-sky-500 hover:underline flex items-center space-x-1" onclick="fathom.trackGoal('IMTFYIZT', 0);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
                <span>{{ ($alt_phone ?? '1.844.744.8723') }}</span>
            </a>
        </div>
    </div>
</nav>

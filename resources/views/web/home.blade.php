<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/jpeg">
        <title>{{ __("Landing Pages - URBE University") }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('web.nav')

        <div class="max-w-7xl mx-auto">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="py-12 text-center">
                    <h1 class="text-4xl font-extrabold text-[#073260]">{{ __("Landing Pages Repository") }}</h1>
                    <p class="mt-4 text-lg font-medium text-slate-700">Welcome to URBE's landing pages repository. Below, you will find all our currently active pages.</p>
                </div>
                <div class="py-12 grid grid-cols-3 gap-8">
                    @forelse (\App\Models\Page::where('status', 1)->get() as $page)
                        <div class="col-span-3 md:col-span-1">
                            <div class="w-full bg-slate-50 rounded-lg shadow">
                                <img src="{{ asset($page->cover) }}" alt="" class="w-full aspect-video object-cover object-center rounded-t-lg">
                                <div class="p-4 text-center">
                                    <p class="text-lg font-bold text-[#073260]">{{ $page->title }}</p>
                                    <a href="{{ route('page.show', ['page' => $page->slug]) }}" class="inline-block mt-2 text-sm text-[#0ea5e9] font-semibold uppercase hover:text-[#073260] transition-all">
                                        {{ __("See details") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>

        <footer class="md:fixed bottom-0 w-full px-4 sm:px-6 lg:px-8">
            <div class="py-4 text-center text-xs md:text-sm font-medium text-slate-600">
                <p>Information is correct at the time of publishing but may be subject to change without notice.</p>
                <p class="mt-1">US: <a href="tel:+18447448723" class="text-[#0ea5e9]">(+1) 844-744-8723</a> EMAIL: <a href="mailto:admissions@urbe.university" class="text-[#0ea5e9]">admissions@urbe.universiy</a></p>
                <p class="mt-1">© {{ date('Y') }} URBE University · All rights reserved</p>
            </div>
        </footer>
    </body>
</html>

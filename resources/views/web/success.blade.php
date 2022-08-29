<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ ($title ?? '') . ' - ' . config('app.name', 'URBE University') }}</title>
        <meta name="description" content="{{$title}}">
        <!-- Styles -->
        @vite('resources/css/app.css')

        @production
            {{-- Fathom Analytics Script --}}
            <script src="https://cdn.usefathom.com/script.js" data-site="DFMPFROV" defer></script>
            {{-- Google Analytics --}}
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-GQ9RRCYVY1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-GQ9RRCYVY1');
            </script>
        @endproduction
    </head>
    <body class="bg-white"
        @production
            onload="fathom.trackGoal('PW9XZZCK', 0);"
        @endproduction
    >
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

        {{-- Main section --}}
        <main class="py-12 w-full">
            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8 bg-cover bg-center rounded-md shadow-lg" style="background-image: url({{asset('student-confirmation-1.webp')}})">
                <h1 class="text-5xl font-extrabold text-[#073260]">{{__("Thank you!")}} 🎉</h1>

                @if ($lock_docs && ($doc_es_url || $doc_en_url))
                    <p class="text-lg mt-8 w-full md:w-1/2 bg-white/70 md:bg-none backdrop-blur-sm md:backdrop-blur-none p-4 rounded-md">{{ __("Thank you for reaching out! Now you can download our brochure by clicking the links below.") }}</p>
                    <div class="mt-6 w-full sm:w-1/2 flex items-center space-x-6">
                        @if ($doc_es_url)
                            <div class="w-full md:w-auto text-center">
                                <a href="{{ ($doc_es_url) ? asset($doc_es_url) : '' }}" class="inline-block mt-4 text-sm uppercase font-medium text-[#073260] bg-white/80 backdrop-blur hover:bg-white rounded-md p-4" onclick="fathom.trackGoal('9FXEDZDZ', 0);">
                                    <img src="{{ asset('es.svg') }}" alt="Spain flag" class="w-24 h-24 mx-auto">
                                    <div class="mt-4">Descargar documento</div>
                                </a>
                            </div>
                        @endif
                        @if ($doc_en_url)
                            <div class="w-full md:w-auto text-center">
                                <a href="{{ ($doc_en_url) ? asset($doc_en_url) : '' }}" class="inline-block mt-4 text-sm uppercase font-medium text-[#073260] bg-white/80 backdrop-blur hover:bg-white rounded-md p-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">
                                    <img src="{{ asset('us.svg') }}" alt="USA flag" class="w-24 h-24 mx-auto">
                                    <div class="mt-4">Download Brochure</div>
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-lg mt-8 w-full md:w-1/2 bg-white/70 md:bg-none backdrop-blur-sm md:backdrop-blur-none p-4 rounded-md">{{__("We have received your inquiry, and one of our admissions representatives will contact you shortly. In the meantime, you can learn more about our other programs, and events that are happening right now at URBE. Click one of the links below to continue.")}}</p>
                @endif

                {{-- External Links --}}
                <ul class="mt-12 space-y-3">
                    <li>
                        <a href="https://www.urbe.university/academics?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[black] group transition-all">
                            <span>Academic programs</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://library.urbe.university?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[black] group transition-all">
                            <span>Library services</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.urbe.university/events?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[black] group transition-all">
                            <span>Campus Events</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </main>

        {{-- Scripts --}}
        @vite('resources/js/app.js')
    </body>
</html>

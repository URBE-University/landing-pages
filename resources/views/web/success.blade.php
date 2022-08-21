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

        {{-- Fathom Analytics Script --}}
        <script src="https://cdn.usefathom.com/script.js" data-site="DFMPFROV" defer></script>

        {{-- Recaptcha script --}}
        {!! htmlScriptTagJsApi() !!}
    </head>
    <body class="bg-white">
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
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-5xl font-extrabold text-[#073260] text-center">{{__("Thank you!")}}</h1>

                @if ($lock_docs && ($doc_es_url || $doc_en_url))
                    <p class="text-lg mt-8">{{ __("Thank you for reaching out! Now you can download our brochure by clicking the links below.") }}</p>
                    <div class="mt-6 grid grid-cols-2 justify-center">
                        @if ($doc_es_url)
                            <div class="col-span-2 md:col-span-1 text-center">
                                <a href="{{ ($doc_es_url) ? asset($doc_es_url) : '' }}" class="inline-block mt-4 text-sm uppercase font-medium text-[#073260] hover:bg-sky-100 rounded-lg p-4" onclick="fathom.trackGoal('9FXEDZDZ', 0);">
                                    <img src="{{ asset('es.svg') }}" alt="Spain flag" class="w-24 h-24 mx-auto">
                                    <div class="mt-4">Descargar documento</div>
                                </a>
                            </div>
                        @endif
                        @if ($doc_en_url)
                            <div class="col-span-2 md:col-span-1 text-center">
                                <a href="{{ ($doc_en_url) ? asset($doc_en_url) : '' }}" class="inline-block mt-4 text-sm uppercase font-medium text-[#073260] hover:bg-sky-100 rounded-lg p-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">
                                    <img src="{{ asset('us.svg') }}" alt="USA flag" class="w-24 h-24 mx-auto">
                                    <div class="mt-4">Download Brochure</div>
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <p class="text-lg mt-8">{{__("We have received your inquiry, and one of our admissions representatives will contact you shortly. In the meantime, you can learn more about our other programs, and events that are happening right now at URBE. Click one of the links below to continue.")}}</p>
                @endif

                {{-- External Links --}}
                <ul class="mt-12 space-y-3">
                    <li>
                        <a href="https://www.urbe.university/academics?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[#0ea5e9] hover:text-[#073260] hover:translate-x-1 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span>Academic programs</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://library.urbe.university?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[#0ea5e9] hover:text-[#073260] hover:translate-x-1 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span>Library services</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.urbe.university/events?utm_source={{$source}}" target="_blank" class="flex items-center space-x-2 text-[#0ea5e9] hover:text-[#073260] hover:translate-x-1 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span>Campus Events</span>
                        </a>
                    </li>
                </ul>
            </div>
        </main>

        {{-- Footer --}}
        <div class="absolute bottom-0 w-full">
            <div class="py-4 text-center text-sm font-semibold text-slate-600">© {{ date('Y') }} URBE University · All rights reserved</div>
        </div>

        {{-- Scripts --}}
        @vite('resources/js/app.js')
    </body>
</html>

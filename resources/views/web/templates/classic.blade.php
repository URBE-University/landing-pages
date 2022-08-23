<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/jpeg">
        <title>{{ ($title ?? '') . ' - ' . config('app.name', 'URBE University') }}</title>
        <meta name="description" content="{{ $about ?? $title }}">
        <!-- Styles -->
        @vite('resources/css/app.css')

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

        {{-- Recaptcha script --}}
        {!! htmlScriptTagJsApi() !!}
    </head>
    <body class="bg-white">
        @include('web.nav')

        {{-- Header --}}
        <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="header">
            <div class="py-12 sm:hidden text-center mb-6">
                <h1 class="text-3xl text-center font-extrabold text-[#073260]">{{$title ?? ''}}</h1>
                <a href="#cta" class="px-5 py-3 rounded-lg bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all mt-6 inline-block">{{__("Get more information")}}</a>
            </div>
            <div class="w-full aspect-video lg:aspect-auto flex lg:inline-block sm:h-full bg-cover bg-right bg-no-repeat" style="background-image: url({{ ($cover) ? asset($cover) : '' }})">
                {{-- Tablet version --}}
                <div class="hidden sm:flex items-center justify-start lg:hidden px-8">
                    <div class="w-1/2 p-8 bg-white/80 backdrop-blur-sm rounded-lg dropshadow-lg">
                        <h1 class="text-4xl font-extrabold text-[#073260]">{{$title ?? ''}}</h1>
                        <div class="block mt-6">
                            <a href="#cta" class="form-button inline-block">{{__("Get more information")}}</a>
                        </div>
                    </div>
                </div>
                {{-- Desktop version --}}
                <div class="hidden lg:grid grid-cols-2 gap-8">
                    <div class="p-8 lg:p-12 col-span-1">
                        <div class="p-8 bg-white/90 xl:w-5/6 backdrop-blur-sm rounded-lg shadow-lg">
                            <h3 class="text-xl font-bold text-[#073260]">{{ __("Find out how URBE can help you shape up your future.") }}</h3>
                            <p class="form-subtitle">{{__("Fill out this form and we will call you soon with all the answers to your questions.")}}</p>
                            <form action="/submit" method="post" class="w-full">
                                @csrf
                                <input type="hidden" name="source" value="{{$source ?? ''}}">

                                <input  type="text" class="form-input" name="firstname"  placeholder="{{ __("First Name") }} *" autofocus>
                                @if ($errors->has('firstname'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Please enter your First Name") }}</p>
                                @endif

                                <input  type="text" class="form-input" name="lastname"  placeholder="{{ __("Last Name") }} *">
                                @if ($errors->has('lastname'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Please enter your Last Name") }}</p>
                                @endif

                                <input  type="email" class="form-input" name="email"  placeholder="{{ __("E-mail") }} *">
                                @if ($errors->has('email'))
                                    <p class="text-xs text-red-600 mt-1">{{ $errors->get('email')[0] }}</p>
                                @endif

                                <input  type="tel" class="form-input" name="phone"  placeholder="{{ __("Phone") }} *">
                                @if ($errors->has('phone'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Please enter your Phone") }}</p>
                                @endif

                                <input type="number" class="form-input" name="zip"  placeholder="{{ __("Area code / Zip") }}">

                                <div class="mt-6">
                                    <button class="form-button w-full" type="submit" onclick="fathom.trackGoal('PW9XZZCK', 0);">
                                        @if ($lock_docs)
                                            {{__("Download brochure!")}}
                                        @else
                                            {{__("Contact me!")}}
                                        @endif
                                    </button>
                                    @if ($document_en_url && !$lock_docs)
                                        <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="form-link inline-block mt-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">{{__("Download brochure")}}</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-span-1 relative">
                        <div class="absolute bottom-0 right-0 w-full bg-white/90 backdrop-blur-sm p-12">
                            <h1 class="text-5xl font-black text-[#073260]">{{$title ?? ''}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Main section --}}
        <main class="w-full">
            {{-- About the program --}}
            <div class="max-w-7xl mx-auto">
                <div class="px-4 sm:px-6 lg:px-8 py-12 md:py-24">
                    @if ($about)
                        <h2 class="text-3xl font-bold text-[#073260] text-center">{{__("About the program")}}</h2>
                        <div class="mt-4 max-w-5xl mx-auto text-center">
                            <p>{{$about}}</p>
                        </div>
                    @else
                        <h2 class="text-3xl font-bold text-[#073260] text-center">{{__("About URBE University")}}</h2>
                        <div class="mt-4 max-w-5xl mx-auto text-center">
                            <p class="form-subtitle">{{__("URBE University provides students opportunities to become professional and competent in careers that lead towards employment in a dynamic global labor workforce. Our programs empower students to advance their knowledge on leadership, technology, innovation, problem-solving, and critical thinking. Faculty, staff, and administration give our students direction, education, and support for professional advancement.")}}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Languages --}}
            @if (($document_es_url || $document_en_url) && !$lock_docs)
                <div class="w-full bg-gray-100" id="features">
                    <div class="max-w-7xl mx-auto">
                        <div class="px-4 sm:px-6 lg:px-8 py-12 md:py-24" id="languages">
                            <div class="grid grid-cols-2 gap-8">
                                <div class="col-span-2 md:col-span-1 text-center md:text-left">
                                    <h2 class="text-3xl font-bold text-[#073260]">{{__("Multiple languages")}}</h2>
                                    <p class="form-subtitle">{{ __("We want to be as inclusive as we possibly can. That's why all of our programs are currently available in both English and Spanish. You can get more information about this program in your preferred language right here.") }}</p>
                                </div>
                                <div class="h-full col-span-2 md:col-span-1">
                                    <div class="w-full h-full flex items-center justify-center space-x-16 mx-auto">
                                        <div class="flex-none text-center">
                                            <img src="{{ asset('es.svg') }}" alt="Spain flag" class="w-16 h-16 mx-auto">
                                            <h3 class="mt-2 text-lg font-bold">Espa&ntilde;ol</h3>
                                            @if ($document_es_url && !$lock_docs)
                                                <a href="{{ ($document_es_url) ? asset($document_es_url) : '' }}" target="_blank" class="text-base capitalize underline" onclick="fathom.trackGoal('9FXEDZDZ', 0);">Descargar documento</a>
                                            @endif
                                        </div>
                                        <div class="flex-none text-center">
                                            <img src="{{ asset('us.svg') }}" alt="United States flag" class="w-16 h-16 mx-auto">
                                            <h3 class="mt-2 text-lg font-bold">English</h3>
                                            @if ($document_en_url && !$lock_docs)
                                                <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="text-base capitalize underline" onclick="fathom.trackGoal('EFWIUGQZ', 0);">Download document</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Frequently asked questions --}}
            @if ($questions->count() > 0)
                <div class="py-12 md:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" id="faq">
                    <h2 class="text-3xl font-bold text-[#073260]">{{ __("Fequently Asked Questions") }}</h2>

                    <div x-data="{ active: null }" class="mt-6 text-left mx-auto max-w-7xl space-y-4">
                        @forelse ($questions as $question)
                            <div x-data="{
                                id: {{ $question->id }},
                                get expanded() {
                                    return this.active === this.id
                                },
                                set expanded(value) {
                                    this.active = value ? this.id : null
                                },
                            }" role="region" class="rounded-lg bg-white border">
                                <h2>
                                    <button
                                        x-on:click="expanded = !expanded"
                                        :aria-expanded="expanded"
                                        class="flex w-full items-center justify-between px-6 py-4 text-lg text-[#073260] font-bold"
                                    >
                                        <span>{{ $question->question }}</span>
                                        <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                        <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                    </button>
                                </h2>

                                <div x-show="expanded" x-collapse>
                                    <div class="px-6 pb-4">{{ $question->answer }}</div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            @endif

            {{-- Owner signature --}}
            <div class="w-full bg-[#073260]" id="signature">
                <div class="py-12 md:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="w-full grid grid-cols-6 items-center gap-8">
                        <div class="col-span-6 md:col-span-2">
                            <img src="{{ asset('dr-belloso-bw.webp') }}" alt="Dr. Oscar Belloso Medina black and white portrait" class="mx-auto md:mx-0 border-[8px] border-white rounded-full w-2/3 md:w-full">
                        </div>
                        <div class="col-span-6 md:col-span-4">
                            <h2 class="text-2xl lg:text-3xl font-bold text-white uppercase">{{ __("We educate future alumni to become marketable, skilled, and progressive leaders who are socially responsible and uphold ethical business standards.") }}</h2>
                            <p class="mt-4 font-bold text-lg text-white">Dr. Oscar Belloso Medina</p>
                            <p class="text-white"> {{ __("Chancellor & Founder") }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Call to Action --}}
            <div class="py-12 md:py-24" id="cta">
                {{-- CTA --}}
                <div class="hidden md:block max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-center text-3xl font-bold text-[#073260]">{{ __("Would you like to learn more about the ") . ($title ?? '') . '?' }}</h2>
                    <p class="text-lg text-gray-800/95 font-medium mt-4">{{ __("Complete the form on this page with your information, and one of our Admissions representatives will contact you soon.") }}</p>
                    <div class="mt-8">
                        <a href="#header" class="px-5 py-3 rounded-lg bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all">Take me to the form!</a>
                    </div>
                </div>

                {{-- Form for mobile and tablet --}}
                <div class="block md:hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-[#073260]">{{ __("Find out how URBE can help you shape up your future.") }}</h2>
                        <p class="text-lg text-gray-800/95 font-medium mt-4">{{ __("Complete this form with your information, and one of our Admissions representatives will contact you soon.") }}</p>
                    </div>

                    {{-- Mobile form --}}
                    <form action="/submit" method="post" class="mt-6 w-full">
                        @csrf
                        <input type="hidden" name="source" value="{{$source ?? ''}}">

                        <input  type="text" class="form-input" name="firstname"  placeholder="{{ __("First Name") }} *" autofocus>
                        @if ($errors->has('firstname'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Please enter your First Name") }}</p>
                        @endif

                        <input  type="text" class="form-input" name="lastname"  placeholder="{{ __("Last Name") }} *">
                        @if ($errors->has('lastname'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Please enter your Last Name") }}</p>
                        @endif

                        <input  type="email" class="form-input" name="email"  placeholder="{{ __("E-mail") }} *">
                        @if ($errors->has('email'))
                            <p class="text-xs text-red-600 mt-1">{{ $errors->get('email')[0] }}</p>
                        @endif

                        <input  type="tel" class="form-input" name="phone"  placeholder="{{ __("Phone") }} *">
                        @if ($errors->has('phone'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Please enter your Phone") }}</p>
                        @endif

                        <input type="number" class="form-input" name="zip"  placeholder="{{ __("Area code / Zip") }}">

                        <div class="mt-8">
                            <button class="form-button w-full" type="submit" onclick="fathom.trackGoal('PW9XZZCK', 0);">
                                @if ($lock_docs)
                                    {{__("Download brochure!")}}
                                @else
                                    {{__("Contact me!")}}
                                @endif
                            </button>
                            @if ($document_en_url && !$lock_docs)
                                <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="form-link inline-block mt-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">{{__("Download brochure")}}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="py-4 text-center text-sm font-semibold text-slate-600">© {{ date('Y') }} {{ __("URBE University · All rights reserved") }}</footer>

        {{-- Scripts --}}
        <script>
            console.log("Website built by Elvis Blanco https://twitter.com/_ebglez");
        </script>
        <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/7083196.js"></script>
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/jpeg">
        <title>{{ ($title ?? '') . ' - ' . config('app.name', 'URBE University') }}</title>

        <!-- HTML Meta Tags -->
        <meta name="description" content="{{ $about ?? $title }}">

        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title }}">
        <meta name="og:description" content="{{ $about ?? $title }}">
        <meta property="og:image" content="{{ asset($cover) }}">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="{{ config('app.url') }}">
        <meta property="twitter:url" content="{{ Request::url() }}">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="{{ $about ?? $title }}">
        <meta property="twitter:image" content="{{ asset($cover) }}">

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
            {{-- End of Google Analytics --}}
            {{-- Facebook Pixel --}}
            <script>
                !function(f,b,e,v,n,t,s){
                    if(f.fbq)return;n=f.fbq=function(){
                        n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)
                    };
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)
                }
                (window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '8054985894571782');
                fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" src="https://www.facebook.com/tr?id=8054985894571782&ev=PageView&noscript=1"/>
            </noscript>
            {{-- End of Facebook Pixel --}}
        @endproduction

        {{-- Recaptcha script --}}
        {!! htmlScriptTagJsApi() !!}
    </head>
    <body class="bg-white">
        @include('web.partials.clickcease')
        <nav class="max-w-7xl mx-auto border-b md:border-b-0">
            <div class="w-full flex items-center justify-between py-8 px-4 sm:px-6 lg:px-8">
                <img src="{{ asset('urbe-logo.svg') }}" alt="" class="w-24 md:w-36">

                <div class="flex items-center space-x-3">
                    <p class="hidden sm:block text-normal text-slate-600">{{__("¡Estamos aquí para servirle!")}}</p>
                    <a href="tel:+{{ ($alt_phone ?? '1.844.744.8723') }}" class="font-bold text-sky-500 hover:underline flex items-center space-x-1" onclick="fathom.trackGoal('IMTFYIZT', 0);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <span>{{ ($alt_phone ?? '1.844.744.8723') }}</span>
                    </a>
                </div>
            </div>
        </nav>

        {{-- Header --}}
        <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="header">
            <div class="py-12 sm:hidden text-center mb-6">
                <h1 class="text-3xl text-center font-extrabold text-[#073260]">{{$title ?? ''}}</h1>
                <a href="#cta" class="px-5 py-3 rounded-md bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all mt-6 inline-block">{{__("Más información")}}</a>
            </div>
            <div class="w-full aspect-video lg:aspect-auto flex lg:inline-block sm:h-full bg-cover bg-right bg-no-repeat" style="background-image: url({{ ($cover) ? asset($cover) : '' }})">
                {{-- Tablet version --}}
                <div class="hidden sm:flex items-center justify-start lg:hidden px-8">
                    <div class="w-1/2 p-8 bg-white/80 backdrop-blur-sm rounded-md dropshadow-lg">
                        <h1 class="text-4xl font-extrabold text-[#073260]">{{$title ?? ''}}</h1>
                        <div class="block mt-6">
                            <a href="#cta" class="form-button inline-block">{{__("Más información")}}</a>
                        </div>
                    </div>
                </div>
                {{-- Desktop version --}}
                <div class="hidden lg:grid grid-cols-2 gap-8">
                    <div class="p-8 lg:p-12 col-span-1">
                        <div class="p-8 bg-white/90 xl:w-5/6 backdrop-blur-sm rounded-md shadow-lg">
                            <h3 class="text-xl font-bold text-[#073260]">{{ __("Descubre cómo URBE puede ayudarte a dar forma a tu futuro.") }}</h3>
                            <p class="form-subtitle">{{__("Llena este formulario, y pronto te llamaremos con todas las respuestas a tus preguntas.")}}</p>
                            <form action="/submit" method="post" class="w-full">
                                @csrf
                                <input type="hidden" name="source" value="{{$source ?? ''}}">
                                <input type="hidden" name="program_of_interest" value="{{ $title }}">

                                <input  type="text" class="form-input" name="firstname"  placeholder="{{ __("Nombre") }} *" autofocus>
                                @if ($errors->has('firstname'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su numbre.") }}</p>
                                @endif

                                <input  type="text" class="form-input" name="lastname"  placeholder="{{ __("Apellido(s)") }} *">
                                @if ($errors->has('lastname'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su apellido(s).") }}</p>
                                @endif

                                <input  type="email" class="form-input" name="email"  placeholder="{{ __("Correo electrónico") }} *">
                                @if ($errors->has('email'))
                                    <p class="text-xs text-red-600 mt-1">{{ $errors->get('email')[0] }}</p>
                                @endif

                                <input  type="tel" class="form-input" name="phone"  placeholder="{{ __("Teléfono") }} *">
                                @if ($errors->has('phone'))
                                    <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su Teléfono.") }}</p>
                                @endif

                                <input type="number" minlength="5" maxlength="5" class="form-input" name="zip"  placeholder="{{ __("Código postal") }}">

                                <div class="mt-6">
                                    <button class="form-button w-full" type="submit">
                                        @if ($lock_docs)
                                            {{__("Descargar folleto")}}
                                        @else
                                            {{__("Enviar información")}}
                                        @endif
                                    </button>
                                    @if ($document_en_url && !$lock_docs)
                                        <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="form-link inline-block mt-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">{{__("Descargar folleto")}}</a>
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
                        <h2 class="text-3xl font-bold text-[#073260] text-center">Sobre este programa</h2>
                        <div class="mt-4 max-w-5xl mx-auto text-center">
                            <p>{{$about}}</p>
                        </div>
                    @else
                        <h2 class="text-3xl font-bold text-[#073260] text-center">Sobre URBE University</h2>
                        <div class="mt-4 max-w-5xl mx-auto text-center">
                            <p class="form-subtitle">URBE University brinda a los estudiantes oportunidades para convertirse en profesionales y competentes en carreras que conducen al empleo en una fuerza laboral global dinámica. Nuestros programas capacitan a los estudiantes para avanzar en sus conocimientos sobre liderazgo, tecnología, innovación, resolución de problemas y pensamiento crítico. La facultad, el personal y la administración brindan a nuestros estudiantes dirección, educación y apoyo para el avance profesional.</p>
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
                                    <h2 class="text-3xl font-bold text-[#073260]">Múltiples idiomas</h2>
                                    <p class="form-subtitle">Todos nuestros programas están actualmente disponibles en inglés y español. Aquí puede encontrar más información sobre este programa en su idioma preferido.</p>
                                </div>
                                <div class="h-full col-span-2 md:col-span-1">
                                    <div class="w-full h-full flex items-center justify-center space-x-16 mx-auto">
                                        @if ($document_es_url && !$lock_docs)
                                        <div class="flex-none text-center">
                                                <a href="{{ ($document_es_url) ? asset($document_es_url) : '' }}" target="_blank" class="text-base capitalize underline text-[#073260] hover:text-[#10a2da]" onclick="fathom.trackGoal('9FXEDZDZ', 0);">
                                                    <img src="{{ asset('es.svg') }}" alt="Spain flag" class="w-16 h-16 mx-auto">
                                                    <h3 class="mt-2 text-lg font-bold">Espa&ntilde;ol</h3>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($document_en_url && !$lock_docs)
                                        <div class="flex-none text-center">
                                                <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="text-base capitalize underline text-[#073260] hover:text-[#10a2da]" onclick="fathom.trackGoal('EFWIUGQZ', 0);">
                                                    <img src="{{ asset('us.svg') }}" alt="United States flag" class="w-16 h-16 mx-auto">
                                                    <h3 class="mt-2 text-lg font-bold">English</h3>
                                                </a>
                                            </div>
                                        @endif
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
                    <h2 class="text-3xl font-bold text-[#073260]">Preguntas más frecuentes</h2>

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
                            }" role="region" class="rounded-md bg-white border">
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
                    <h2 class="text-center text-3xl font-bold text-[#073260]">Descubre cómo URBE puede ayudarte a dar forma a tu futuro.</h2>
                    <p class="text-lg text-gray-800/95 font-medium mt-4">Complete el formulario en esta página con su información, y uno de nuestros representantes de Admisiones se comunicará con usted en unos minutos.</p>
                    <div class="mt-8">
                        <a href="#header" class="px-5 py-3 rounded-md bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all">{{ __("Llévame al formulario") }}</a>
                    </div>
                </div>

                {{-- Form for mobile and tablet --}}
                <div class="block md:hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-[#073260]">{{ __("Descubre cómo URBE puede ayudarte a dar forma a tu futuro.") }}</h2>
                        <p class="text-lg text-gray-800/95 font-medium mt-4">{{ __("Complete este formulario con su información, y uno de nuestros representantes de Admisiones se comunicará con usted en unos minutos.") }}</p>
                    </div>

                    {{-- Mobile form --}}
                    <form action="/submit" method="post" class="mt-6 w-full">
                        @csrf
                        <input type="hidden" name="source" value="{{$source ?? ''}}">
                        <input type="hidden" name="program_of_interest" value="{{ $title }}">

                        <input  type="text" class="form-input" name="firstname"  placeholder="{{ __("Nombre") }} *" autofocus>
                        @if ($errors->has('firstname'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su numbre.") }}</p>
                        @endif

                        <input  type="text" class="form-input" name="lastname"  placeholder="{{ __("Apellido(s)") }} *">
                        @if ($errors->has('lastname'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su apellido(s).") }}</p>
                        @endif

                        <input  type="email" class="form-input" name="email"  placeholder="{{ __("Correo electrónico") }} *">
                        @if ($errors->has('email'))
                            <p class="text-xs text-red-600 mt-1">{{ $errors->get('email')[0] }}</p>
                        @endif

                        <input  type="tel" class="form-input" name="phone"  placeholder="{{ __("Teléfono") }} *">
                        @if ($errors->has('phone'))
                            <p class="text-xs text-red-600 mt-1">{{ __("Por favor, escriba su Teléfono.") }}</p>
                        @endif

                        <input type="number" minlength="5" maxlength="5" class="form-input" name="zip"  placeholder="{{ __("Código postal") }}">

                        <div class="mt-8">
                            <button class="form-button w-full" type="submit">
                                @if ($lock_docs)
                                    {{__("Descargar folleto")}}
                                @else
                                    {{__("Enviar información")}}
                                @endif
                            </button>
                            @if ($document_en_url && !$lock_docs)
                                <a href="{{ ($document_en_url) ? asset($document_en_url) : '' }}" target="_blank" class="form-link inline-block mt-4" onclick="fathom.trackGoal('EFWIUGQZ', 0);">{{__("Descargar folleto")}}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="py-4 text-center text-sm font-semibold text-slate-600">© {{ date('Y') }} {{ __("URBE University · Todos los derechos reservados") }}</footer>

        {{-- Scripts --}}
        <script>
            console.log("Website built by Elvis Blanco https://twitter.com/_ebglez");
        </script>
        <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/7083196.js"></script>
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </body>
</html>

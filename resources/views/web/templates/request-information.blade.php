<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/jpeg">
        <title>{{ 'Request Information about URBE University - ' . config('app.name', 'URBE University') }}</title>
        <!-- HTML Meta Tags -->
        <meta name="description" content="URBE University provides students opportunities to become professional and competent in careers that lead towards employment in a dynamic global labor workforce...">

        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{ Request::url() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Request Information about URBE University">
        <meta name="og:description" content="URBE University provides students opportunities to become professional and competent in careers that lead towards employment in a dynamic global labor workforce...">
        <meta property="og:image" content="{{ asset('student-confirmation-1.webp') }}">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="{{ config('app.url') }}">
        <meta property="twitter:url" content="{{ Request::url() }}">
        <meta name="twitter:title" content="Request Information about URBE University">
        <meta name="twitter:description" content="URBE University provides students opportunities to become professional and competent in careers that lead towards employment in a dynamic global labor workforce...">
        <meta property="twitter:image" content="{{ asset('student-confirmation-1.webp') }}">

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
        @livewire('announcement.show')
        @include('web.nav')
        {{-- Header --}}
        <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="header">
            <div class="py-12 sm:hidden text-center mb-6">
                <h1 class="text-3xl text-center font-extrabold text-[#073260]">Request Information</h1>
                <a href="#cta" class="px-5 py-3 rounded-md bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all mt-6 inline-block">{{__("Get more details")}}</a>
            </div>
            <div class="w-full aspect-video lg:aspect-auto flex lg:inline-block sm:h-full bg-cover bg-right bg-no-repeat" style="background-image: url({{ asset('student-confirmation-1.webp') }})">
                {{-- Tablet version --}}
                <div class="hidden sm:flex items-center justify-start lg:hidden px-8">
                    <div class="w-full p-8 bg-white/80 backdrop-blur-sm rounded-md dropshadow-lg">
                        <h1 class="text-4xl font-extrabold text-[#073260]">Request Information</h1>
                        <div class="block mt-6">
                            <a href="#cta" class="form-button inline-block">{{__("Get more information")}}</a>
                        </div>
                    </div>
                </div>
                {{-- Desktop version --}}
                <div class="hidden lg:grid grid-cols-2 gap-8">
                    <div class="p-8 lg:p-12 col-span-1">
                        <div class="p-8 bg-white/90 xl:w-5/6 backdrop-blur-sm rounded-md shadow-lg">
                            <h3 class="text-xl font-bold text-[#073260]">{{ __("Find out how URBE can help you shape up your future.") }}</h3>
                            <p class="form-subtitle">{{__("Fill out this form and we will call you soon with all the answers to your questions.")}}</p>
                            <form action="/submit" method="post" class="w-full">
                                @csrf
                                <input type="hidden" name="source" value="lp-request-information">

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

                                <input type="number" minlength="5" maxlength="5" class="form-input" name="zip"  placeholder="{{ __("Area code / Zip") }}">

                                <select name="program_of_interest" class="form-input text-slate-500">
                                    <option value="" class="text-slate-500">Interested in one of our programs?</option>
                                    <option value="MBA">Master in Business Administration</option>
                                    <option value="MIDT">Master in Instructional Design & Technology</option>
                                    <option value="BBA">Bachelor in Business Administration</option>
                                    <option value="BMCM">Bachelor in Mass Communication and Marketing</option>
                                </select>

                                <div class="mt-6">
                                    <button class="form-button w-full" type="submit">
                                        {{__("Contact me!")}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-span-1 relative">
                        <div class="absolute bottom-0 right-0 w-full bg-white/80 backdrop-blur-sm p-12">
                            <h1 class="text-5xl font-black text-[#073260]">Request Information</h1>
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
                    <h2 class="text-3xl font-bold text-[#073260] text-center">{{__("About URBE University")}}</h2>
                    <div class="mt-4 max-w-5xl mx-auto text-center">
                        <p class="form-subtitle">{{__("URBE University provides students opportunities to become professional and competent in careers that lead towards employment in a dynamic global labor workforce. Our programs empower students to advance their knowledge on leadership, technology, innovation, problem-solving, and critical thinking. Faculty, staff, and administration give our students direction, education, and support for professional advancement.")}}</p>
                    </div>
                </div>
            </div>

            {{-- Languages --}}
            <div class="w-full bg-gray-100" id="features">
                <div class="max-w-7xl mx-auto">
                    <div class="px-4 sm:px-6 lg:px-8 py-12 md:py-24" id="languages">
                        <div class="grid grid-cols-2 gap-8">
                            <div class="col-span-2 md:col-span-1 text-center md:text-left">
                                <h2 class="text-3xl font-bold text-[#073260]">{{__("Multiple languages")}}</h2>
                                <p class="form-subtitle">{{ __("We want to be as inclusive as we possibly can. That's why all of our programs are currently available in both English and Spanish. You can get more information about our programs by calling us today, or filling out the form on this page.") }}</p>
                            </div>
                            <div class="h-full col-span-2 md:col-span-1">
                                <div class="w-full h-full flex items-center justify-center space-x-16 mx-auto">
                                    <div class="flex-none text-center">
                                        <img src="{{ asset('es.svg') }}" alt="Spain flag" class="w-16 h-16 mx-auto">
                                        <h3 class="mt-2 text-lg font-bold">Espa&ntilde;ol</h3>
                                    </div>
                                    <div class="flex-none text-center">
                                        <img src="{{ asset('us.svg') }}" alt="United States flag" class="w-16 h-16 mx-auto">
                                        <h3 class="mt-2 text-lg font-bold">English</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Frequently asked questions --}}
                <div class="py-12 md:py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" id="faq">
                    <h2 class="text-3xl font-bold text-[#073260]">{{ __("Fequently Asked Questions") }}</h2>

                    <div x-data="{ active: null }" class="mt-6 text-left mx-auto max-w-7xl space-y-4">
                        <div x-data="{
                            id: 1,
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
                                    <span>
                                        Are your programs offered online?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    Yes. All of URBE's programs are offered on campus and online.
                                </div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 2,
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
                                    <span>
                                        Does URBE offer I-20 / student visas?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    No. We are currently not offering student visas.
                                </div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 3,
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
                                    <span>
                                        Can I transfer earned credits to URBE?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    Credit transfer is determined by our Academic department, taking into account course content, grades, accreditation, and licensing of the institution granting such credits. Transcripts from foreign institutions must be legally translated to English and then evaluated by a NACES approved evaluation company in the United States.
                                </div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 4,
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
                                    <span>
                                        Does URBE evaluate international certificates / diplomas?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    No. URBE University is not a document evaluation agency. Therefore, we do not offer evaluation or transcription services. You can refer to https://www.naces.org to find document evaluation agencies near you.
                                </div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 5,
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
                                    <span>
                                        Is URBE University acredited?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    URBE University is not accredited. Therefore, if you enroll in this institution, you will not be eligible for Title IV Federal Financial Assistance, State Student Financial Assistance, or Professional Certification. In addition, credits earned at this institution may not be accepted for transfer to another institution and may not be recognized by employers.
                                </div>
                            </div>
                        </div>

                        <div x-data="{
                            id: 6,
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
                                    <span>
                                        Does URBE offer financial aid?
                                    </span>
                                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                                </button>
                            </h2>

                            <div x-show="expanded" x-collapse>
                                <div class="px-6 pb-4">
                                    At this time, URBE University does not offer Federal Financial Aid. However, we offer payment plans and scholarships to enrolled students. Please notice that terms and conditions may apply.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                    <h2 class="text-center text-3xl font-bold text-[#073260]">Find out how URBE can help you shape up your future.</h2>
                    <p class="text-lg text-gray-800/95 font-medium mt-4">Complete the form on this page, and one of our Admissions representatives will contact you soon.</p>
                    <div class="mt-8">
                        <a href="#header" class="px-5 py-3 rounded-md bg-[#10a2da] hover:bg-[#073260]/90 text-white text-sm font-semibold uppercase tracking-wide transition-all">Take me to the form!</a>
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

                        <input type="number" minlength="5" maxlength="5" class="form-input" name="zip"  placeholder="{{ __("Area code / Zip") }}">

                        <select name="program_of_interest" class="form-input text-slate-500">
                            <option value="" class="text-slate-500">Interested in one of our programs?</option>
                            <option value="MBA">Master in Business Administration</option>
                            <option value="MIDT">Master in Instructional Design & Technology</option>
                            <option value="BBA">Bachelor in Business Administration</option>
                            <option value="BMCM">Bachelor in Mass Communication and Marketing</option>
                        </select>

                        <div class="mt-8">
                            <button class="form-button w-full" type="submit">
                                {{__("Contact me!")}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="py-4 text-center text-sm font-semibold text-slate-600">?? {{ date('Y') }} {{ __("URBE University ?? All rights reserved") }}</footer>

        {{-- Scripts --}}
        <script>
            console.log("Website built by Elvis Blanco https://twitter.com/_ebglez");
        </script>
        <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/7083196.js"></script>
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/js/app.js')
    </body>
</html>

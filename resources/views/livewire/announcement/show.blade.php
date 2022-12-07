<div>
    @if ($event)
        <div class="w-full bg-sky-500">
            <div class="max-w-7xl mx-auto text-center py-4">
                @if (app()->getLocale() == 'en')
                    <h1 class="capitalize text-xl text-white">{{ $event->semester }} classes start <span class="font-bold">{{ Carbon\Carbon::parse($event->starts_at)->format('F j') }}</span></h1>
                @else
                @php
                    Carbon\Carbon::setUTF8(true);
                    Carbon\Carbon::setLocale('es_US.utf8');
                    setLocale(LC_ALL, 'es_US.utf8');
                @endphp
                    <h1 class="text-xl text-white">El próximo inicio de clases comienza el <span class="font-bold">{{ Carbon\Carbon::parse($event->starts_at)->formatLocalized('%d %B') }}</span></h1>
                @endif
            </div>
        </div>
    @endif
</div>

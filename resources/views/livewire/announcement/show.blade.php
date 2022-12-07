<div>
    @if ($event)
        <div class="w-full bg-yellow-300 z-50">
            <div class="max-w-7xl mx-auto text-center py-4">
                @if (app()->getLocale() == 'en')
                    <h1 class="capitalize text-xl text-[#073260]">{{ $event->semester }} session starts <span class="font-bold">{{ Carbon\Carbon::parse($event->starts_at)->format('F jS') }}</span></h1>
                @else
                @php
                    Carbon\Carbon::setUTF8(true);
                    Carbon\Carbon::setLocale('es_US.utf8');
                    setLocale(LC_ALL, 'es_US.utf8');
                @endphp
                    <h1 class="text-xl text-[#073260]">El próximo inicio de clases comienza el <span class="font-bold">{{ Carbon\Carbon::parse($event->starts_at)->formatLocalized('%d de %B') }}</span></h1>
                @endif
            </div>
        </div>
    @endif
</div>

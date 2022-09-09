@component('mail::message')
# New Lead Alert!

Hello.<br>
A new lead has just been processed and has been recorded to Hubspot.<br>

<strong>Full Name:</strong> {{ $name }}<br>
<strong>Phone:</strong> {{ $phone }}<br>
<strong>E-mail:</strong> {{ $email }}<br>
<strong>Zip:</strong> {{ $zip }}<br>
<strong>Source:</strong> {{ $source }}<br>

Thanks,<br>
Landing Pages Site
@endcomponent

@component('mail::message')
# Failed to store contact information

Hi there! We were unable to store a contact. Here is the contact information:

Email: {{$email}}<br>
Name: {{$name}}<br>
Phone: {{$phone}}<br>
Lead source: {{$lead_source}}<br>
Program of interest: {{$program_of_interest}}<br>
Zip code: {{$zip}}<br>

Thanks,<br>
Landing Pages Site
@endcomponent

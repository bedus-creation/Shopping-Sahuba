@component('mail::message')
# Thanks For registration.

Please clink on this link to confirm your email.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

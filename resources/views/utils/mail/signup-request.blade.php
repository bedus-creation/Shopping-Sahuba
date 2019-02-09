@component('mail::message')

# Hello, 

Do you wanna sell new products of your shop ? or even Second-Hand ? If so we are here to Help You.

@component('mail::button', ['url' => url('/'), 'color' => 'success'])
Sign Up
@endcomponent

# Features
- Buy or Sell products
- No products Limits
- Shop Profile.
- Comment section
- It's Free, Forever.


Thanks,<br>
{{ config('app.name') }}
@endcomponent

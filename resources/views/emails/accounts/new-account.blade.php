@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('email_confirmation', ['token' => $user->email_token ])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

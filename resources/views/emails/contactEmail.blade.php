@component('mail::message')
# Introduction

The body of your message.
Message: {{ $data->$message }}
From: {{ $data->$name }}
Email: {{ $data->$email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => url('/posts')])
Explore
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

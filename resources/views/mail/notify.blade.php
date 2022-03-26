@component('mail::message')
# 

<div>
    Title: {{ $title }}
</div>

The body of your message.

<div>
    Description: {{ $description }}
</div>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

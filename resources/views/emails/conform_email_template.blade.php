@component('mail::message')
# Introduction

Your Conformation Email is<br>
{{ $userd['emailcode'] }}

@component('mail::button', ['url' => route('conformemailpage')])
Conform
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

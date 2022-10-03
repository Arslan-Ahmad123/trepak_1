@component('mail::message')
# Introduction

Your Conformation Email is 
{{ $userd['emailcode'] }}

@component('mail::button', ['url' => ''])
Your Conformation Email is 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

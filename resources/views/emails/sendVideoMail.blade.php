@component('mail::message')
# Introduction

<span style="color: #483d3d;">Message</span><br>
<span style="color: #483d3d;">Your video consultant request accepted. <span><br>
<span style="color: #483d3d;">Your Name : {{ $clientinfo['fname'] }}</span><br>
<span style="color: #3b3737;font-weight: bold">Engineer Name : {{ $engrinfo->fname }}</span><br>
<span style="color: #3b3737;font-weight: bold">Meeting Date : {{ $orderinfo['client_date'] }}</span><br>
<span style="color: #3b3737;font-weight: bold">Time Date : {{\Carbon\Carbon::createFromFormat('H:i',$orderinfo['client_time'])->format('h:i A')}}</span><br>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

<span style="color: #483d3d;">Thanks,</span><br>
<span style="color: #3b3737;">Treapak Engineer Portal</span> 
@endcomponent

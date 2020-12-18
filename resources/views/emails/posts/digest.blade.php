@component('mail::message')
# Digest

Dit zijn de blogberichten van de laatste week.

@foreach($posts as $post)
<h1>{{ $post->title }}</h1>
<p>{!! nl2br(e($post->lead)) !!}</p>
<p>{!! nl2br(e($post->content)) !!}</p>
<hr>
@endforeach

<br>
Bedankt,<br>
{{ config('app.name') }}
@endcomponent

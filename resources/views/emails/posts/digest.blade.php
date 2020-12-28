@component('mail::message')
# {{ __('posts.digest') }}

{{ __('posts.lastWeeksPosts') }}

@foreach($posts as $post)
<h1>{{ $post->title }}</h1>
<p>{!! nl2br(e($post->lead)) !!}</p>
<p>{!! nl2br(e($post->content)) !!}</p>
<hr>
@endforeach

<br>
{{ __('common.thanks') }},<br>
{{ config('app.name') }}
@endcomponent

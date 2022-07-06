@extends('layouts.dashboard')

@section('content')
<h2>{{ $post->title }}</h2>
<div class="text-muted">Slug : {{ $post->slug }}</div>
<p>{{ post->content }}</p>

<a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Modifica</a>    
@endsection
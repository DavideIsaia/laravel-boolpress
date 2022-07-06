@extends('layouts.dashboard')

@section('content')
<h2>{{ $post->title }}</h2>
<h5 class="text-muted">Slug : {{ $post->slug }}</h5>
<p>{{ $post->content }}</p>

<a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Modifica</a>    
@endsection
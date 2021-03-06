@extends('layouts.dashboard')

@section('content')
<h2>{{ $post->title }}</h2>
<h5 class="text-muted">Slug : {{ $post->slug }}</h5>
<h5>Categoria: {{ $category ? $category->name : 'Nessuna' }}</h5>
<h6>
  Tags: 
  @forelse ($post->tags as $tag)
    {{ $tag->name }}{{ $loop->last ? '' : ', ' }}      
  @empty
      nessun tag associato
  @endforelse
</h6>
@if ($post->thumb)
  <img src="{{ asset('storage/' . $post->thumb) }}" alt="{{ $post->title }}">  
@endif
<p>{{ $post->content }}</p>

<a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Modifica</a>
<form class="d-inline-block" action="{{ route('admin.posts.destroy', [ 'post' => $post->id ]) }}" method="POST" onClick="return confirm('Sei sicuro? (il post non verrà più visualizzato sul browser ma sarà ancora visibile sul database)');">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger">Cancella</button>
</form>    
@endsection
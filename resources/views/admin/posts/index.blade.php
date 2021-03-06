@extends('layouts.dashboard')

@section('content')
<h1>Elenco dei tuoi post</h1>
<div class="row row-cols-4">
  @foreach ($posts as $post)
    <div class="col">
      <div class="card mb-4">
        @if ($post->thumb)
          <img class="card-img-top" src="{{ asset('storage/' . $post->thumb) }}" alt="{{ $post->title }}">  
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          @if (isset($post->category->name))
            <h5 class="text-muted">{{ $post->category->name }}</h5>
          @endif
          <a href="{{ route('admin.posts.show', ['slug' =>$post->slug]) }}" class="btn btn-primary">Dettagli post</a>
        </div>
      </div>
    </div>      
  @endforeach
</div>
{{ $posts->links() }}    
@endsection
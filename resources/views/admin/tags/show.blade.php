@extends('layouts.dashboard')

@section('content')
<h1>{{ $tag->name }}</h1>
<h5 class="text-muted">Slug: {{ $tag->slug }}</h5>
<div class="row row-cols-4">
  @forelse ($tag->posts as $post)
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <a href="{{ route('admin.posts.show', ['slug' =>$post->slug]) }}" class="btn btn-primary">Visualizza</a>
        </div>
      </div>
    </div>
  @empty
  <div class="col">
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Nessun post appartiene a questo tag</h5>
      </div>
    </div>
  </div>
  @endforelse
</div>
    
@endsection
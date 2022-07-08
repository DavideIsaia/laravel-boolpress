@extends('layouts.dashboard')

@section('content')
<h1>{{ $category->name }}</h1>
<h3 class="text-muted">{{ $category->slug }}</h3>
<div class="row row-cols-4">
  @forelse ($category->posts as $post)
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <a href="{{ route('admin.posts.show', ['post' =>$post->id]) }}" class="btn btn-primary">Visualizza</a>
        </div>
      </div>
    </div>
  @empty
  <div class="col">
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Nessun post appartiene a questa categoria</h5>
      </div>
    </div>
  </div>
  @endforelse
</div>
    
@endsection
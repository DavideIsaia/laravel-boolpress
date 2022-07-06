@extends('layouts.dashboard')

@section('content')
<h1>Elenco dei tuoi post</h1>
<div class="row row-cols-4">
  @foreach ($posts as $post)
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <a href="" class="btn btn-primary">Dettagli post</a>
        </div>
      </div>
    </div>      
  @endforeach
</div>
    
@endsection
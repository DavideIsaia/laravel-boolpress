@extends('layouts.dashboard')

@section('content')
<h1>Elenco dei tags</h1>
<div class="row row-cols-4">
  @foreach ($tags as $tag)
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{ $tag->name }}</h5>
          <a href="{{ route('admin.tags.show', ['slug' => $tag->slug]) }}" class="btn btn-primary">Visualizza tutti i post corrispondenti</a>
        </div>
      </div>
    </div>      
  @endforeach
</div>    
    
@endsection
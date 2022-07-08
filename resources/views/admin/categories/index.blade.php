@extends('layouts.dashboard')

@section('content')
<h1>Elenco delle categorie</h1>
<div class="row row-cols-4">
  @foreach ($categories as $category)
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">{{ $category->name }}</h5>
          <a href="{{ route('admin.categories.show', ['slug' => $category->slug]) }}" class="btn btn-primary">Visualizza tutti i post corrispondenti</a>
        </div>
      </div>
    </div>      
  @endforeach
</div>    
    
@endsection
@extends('layouts.dashboard')

@section('content')
<h1>Crea un nuovo post</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
  @method('POST')
  @csrf

  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
  </div>

  <div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" name="category_id" id="category_id">
      <option value="">Nessuna</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <h5>Tags</h5>
    @foreach ($tags as $tag)
      <div class="form-check d-inline-block mx-3">
        <input name="tags[]" 
               class="form-check-input" 
               type="checkbox" 
               value="{{ $tag->id }}" 
               id="tag-{{ $tag->id }}" {{ in_array( $tag->id, old('tags', [])) ? 'checked' : '' }}>
        <label class="form-check-label" for="tag-{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </div>
    @endforeach
  </div>

  <div class="form-group">
    <label for="content">Contenuto</label>
    <textarea type="text" class="form-control" name="content" id="content" rows='10'> {{ old('content') }} </textarea>
  </div>

  <div class="form-group">
    <label for="image">Immagine</label>
    <input type="file" class="form-control" name="image" id="image">
  </div>

  <button type="submit" class="btn btn-primary">Crea</button>
</form>
@endsection
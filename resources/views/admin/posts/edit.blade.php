@extends('layouts.dashboard')

@section('content')
<h1>Modifica post</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


<form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" id="title" name='title' value="{{ old('title') ? old('title') : $post->title }}">
  </div>

  <div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" name="category_id" id="category_id">
      <option value="">Nessuna</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ $post->category &&  old('category_id', $post->category->id) == $category->id ? 'selected' : ''}}> {{ $category->name }} </option>
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
               id="tag-{{ $tag->id }}" {{ ($post->tags->contains($tag) || in_array($tag->id, old('tags', []))) ? 'checked' : '' }}>
        <label class="form-check-label" for="tag-{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </div>
    @endforeach
  </div>

  <div class="form-group">
    <label for="content">Contenuto</label>
    <textarea type="text" class="form-control" id="content" name='content' rows='10'>{{ old('content') ? old('content') : $post->content }}</textarea>
  </div>

  <div class="mb-3">
    <label for="image">Immagine</label>
    <input type="file" id="image" name="image">

    @if ($post->thumb)
        <h5>Immagine attuale</h5>
        <img src="{{ asset('storage/' . $post->thumb) }}" alt="">
    @endif
</div>

  <button type="submit" class="btn btn-primary">Conferma Modifiche</button>
</form>
@endsection
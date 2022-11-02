@extends('layouts.app')

@section('metaTitle','Modifica il tuo Post')

@section('home_link')
<a class="navbar-brand" href="{{ url('/') }}">
  Home
</a>
@endsection

@section('posts_link')
<a class="navbar-brand" href="{{ url('/admin/posts') }}">
  Posts
</a>           
@endsection

@section('content')

<h1 class="text-center">Modifica il tuo Post</h1>
<div class="container">
    <form action="{{ route('admin.posts.update',$post) }}" method="POST">

      @csrf
      @method('PUT')

      <p>
        <label for="title">Titolo</label>
        <input class="w-100" type="text" style=" @error('title') border-color: red  @enderror" value="{{ old('title', $post->title) }}" name="title" id="title" placeholder="Titolo">
        @error('title')
          <div style="color: rgb(0, 72, 255); font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <div class="form-group">
        <label for="category">Categoria</label>
        <select name="category_id" class="custom-select w-25 @error('category_id') is-invalid @enderror" >
          <option value="">-- nessuna --</option>
          @foreach($categories as $category)
            <option @if(old('category_id',$post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        <small id="helpCategory" class="form-text text-muted">Seleziona la categoria</small>
        @error('category_id')
          <div id="category" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label class="d-block" for="category">Tag:</label>

        
        @foreach($tags as $key => $tag)
          <div class="form-check form-check-inline">
            <input  class="form-check-input" name="tags[]" @if( in_array($tag->id, old('tags', $post->tags->pluck('id')->all()) ) ) checked @endif type="checkbox" id="tag-{{$tag->id}}" value="{{ $tag->id }}">
            <label class="form-check-label" for="tag-{{$tag->id}}">{{ $tag->name }}</label>
          </div>
        @endforeach

      </div>


      <p>
        <label for="content">Contenuto</label>
        <input class="w-100" type="text" style=" @error('content') border-color: red  @enderror" value="{{ old('content', $post->content) }}" name="content" id="content" placeholder="Contenuto">
        @error('content')
          <div style="color: rgb(0, 72, 255); font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <input type="submit" value="Salva">
        <a class="ml-2" href="{{ url('admin/posts',$post) }}">Annulla Modifiche</a>
      </p>

    </form>
  </div>

@endsection
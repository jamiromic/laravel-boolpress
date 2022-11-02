@extends('layouts.app')

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

<div class="container">
  <div class="row">
    <div class="col-8">
      <h1><span class="font-weight-bold">Titolo: </span>{{ $post->title }}</h1>
      <p><span class="font-weight-bold">Slug: </span>{{ $post->slug }}</p>

      <div class="col-12">
        <img src="{{ asset('storage/'.$post->cover) }}" width="250" alt="">
      </div>

      @if($post->category)
      <p><span class="font-weight-bold">Categoria: </span>{{ $post->category->name }}</p>
      @endif

      <span class="font-weight-bold">Tags: </span>
      <ul>
        @forelse ($post->tags as $tag)
          <li>
            {{ $tag->name }}
          </li>
            
        @empty
          <li>Nessun Tag</li>
        @endforelse
      </ul>

      <ul class="d-flex list-unstyled">
        <li class="mr-2"><span class="font-weight-bold">Creato il: </span>{{ ($post->created_at)->format('d/m/Y') }}</li>
        <li><span class="font-weight-bold">Ultima Modifica: </span>{{ ($post->updated_at)->format('d/m/Y') }}</li>
      </ul>
    </div>
    <div class="col-4 text-left d-flex justify-content-end align-items-center">
      <a href="{{ route('admin.posts.edit',$post) }}" type="button" class="btn btn-primary btn-sm mr-2">Modifica</a>
      <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
      
        @csrf
        @method('DELETE')

        <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h3 class="font-weight-bold">Contenuto:</h3>
      <p>
        {{-- Inseriamo i punti esclamativi per inserire eventuale HTML che venga interpretato come tale e non come testo --}}
        {!! $post->content !!}
      </p>
    </div>
  </div>
</div>

@endsection
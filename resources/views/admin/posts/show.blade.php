@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Titolo del Post: {{ $post->title }}</h1>


        <div>
            <h3>Content Post:</h3>
            <p>{{ $post->content}}</p>
        </div>

        {{-- @dump($post->category) --}}

        @if ($post->category)
            <h3>Category: {{$post->category->name}}</h3>    
        @elseif ($post->category == null)
            <h3>Nessuna categoria selezionata</h3>
        @endif

        <div>
            <h4>Pubblication Date</h4>
            <p>{{ $post->pubblication_date}}</p>
        </div>

        <div class="mb-5">
            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id)}}">Edit</a>
        </div>

    </div>
    
@endsection
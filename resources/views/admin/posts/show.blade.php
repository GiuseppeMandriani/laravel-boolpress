@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Titolo del Post: {{ $post->title }}</h1>

        {{-- Post Image --}}
        <div class="mb-5">
            <h3>Content Post:</h3>
            <div class="row">
            @if ($post->cover)
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $post->cover)}}" alt="{{ $post->title}}">
                </div>
            @endif
                <div class="{{ ($post->cover == null) ? 'col' : 'col-md-6' }}">
                    <p>{{ $post->content}}</p>
                </div>
            </div>
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

        {{-- POST TAGS --}}
        {{-- @dump($post->tag) --}}
        @if(count($post->tags) > 0)
            @foreach ($post->tags as $tag)
                <span class="badge badge-primary">{{$tag->name}}</span>                
            @endforeach
        @endif

    </div>
    
@endsection
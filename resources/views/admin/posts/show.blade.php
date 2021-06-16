@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>

        <div class="mb-5">
            <a href="{{ route('admin.posts.edit', $post->id)}}">Edit</a>
        </div>

        <div>
            <p>{{ $post->content}}</p>
        </div>

    </div>
    
@endsection
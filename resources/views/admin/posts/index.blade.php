@extends('layouts.app')

@section('content')



    <div class="container">

        @if (session('deleted'))
        <div class="alert alert-success">
            <p> Il post chiamato: {{ session('deleted') }} è stato eliminato con successo.</p>
        
        </div>
            
        @endif
        <h1>Our Posts</h1>
        <a class="btn btn-primary mt-5" href="{{ route ('admin.posts.create')}}">Create New post</a>

        <table class="table table-striped table-dark mt-5">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>TITLE</td>
                    <td>DATE</td>
                    <td>CATEGORY</td>
                    <td colspan="3">ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->title }}</td>
                        {{-- <td>{{ $post->pubblication_date->format('d/m/y')}}</td> --}}
                        {{-- <td>{{ $post->pubblication_date->diffForHumans()}}</td> --}}
                        <td>{{ $post->pubblication_date}}</td>
                        <td>@if($post->category) {{ $post->category->name }}</td> @endif</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                        </td>
                        <td>
                            <a class="btn btn-light" href="{{route('admin.posts.show', $post->id)}}">SHOW</a></td>
                        <td>
                            <form class = "delete-post-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input class = "btn btn-danger" type="submit" value="Delete">
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- GET POSTS BY CATEGORY --}}

        <h2>Post by Category</h2>
        @foreach ($categories as $category )
            <h3 class="mt-4">{{ $category->name }}</h3>

            @forelse ($category->posts as $post)
                <h4>
                    <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                </h4>
                
            @empty
                <h6>No post for this category</h6>
                <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">Create</a>
                
            @endforelse
            
        @endforeach

    </div>
@endsection
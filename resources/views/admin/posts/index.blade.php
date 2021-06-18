@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Our Posts</h1>
        <a class="btn btn-primary mt-5" href="{{ route ('admin.posts.create')}}">Create New post</a>

        <table class="table table-striped table-dark mt-5">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>TITLE</td>
                    <td>DATE</td>
                    <td colspan="3">ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->pubblication_date}}</td>
                        <td>EDIT</td>
                        <td>
                            <a class="btn btn-success" href="{{route('admin.posts.show', $post->id)}}">SHOW</a></td>
                        <td>DELETE</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
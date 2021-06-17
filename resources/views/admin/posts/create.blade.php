@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="">  
                    </div>

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="content" class="form-label">Content*</label>
                        <textarea class="form-control"  name="content" id="content" rows="6"></textarea>
                    </div>

                    {{-- Non utilizzo la a --}}
                    <button class="btn btn-primary"type="submit">Create</button>
                    
                
                
                </form>
            
            </div>
        
        
        </div>

    </div>
    
@endsection
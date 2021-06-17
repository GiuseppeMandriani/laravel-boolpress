@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>

        {{-- Controllo Errori di validazione --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )

                        <li>{{ $error }}</li>
                        
                    @endforeach
                </ul>
            </div>
        @endif

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

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="pubblication_date" class="form-label">Pubblication Date*</label>
                        <input class="form-control" type="date" name="pubblication_date" placeholder="2020-12-31">
                    </div>

                    

                    {{-- Non utilizzo la a --}}
                    <button class="btn btn-primary"type="submit">Create</button>
                    
                
                
                </form>
            
            </div>
        
        
        </div>

    </div>
    
@endsection
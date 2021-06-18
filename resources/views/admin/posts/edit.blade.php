@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit post: 
        <a href="{{ route ('admin.posts.show', $post->id) }}">{{$post->title}}</a>
         </h1>


        <div class="row">
            <div class="col-md-8 offset-md-2">

            {{-- Controllo Errori di validazione --}}

            {{-- Metodo 1 --}}

            @if ($errors->any())
                <div class="alert alert-danger mb-5">
                    <ul>
                        @foreach ($errors->all() as $error )

                            <li>{{ $error }}</li>
                            
                        @endforeach
                    </ul>
                </div>
            @endif




                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="" value="{{ old('title', $post->title) }}">


                    {{-- Controllo Validaznione metodo 2 --}}
                        @error('title')
                        <p class="feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="content" class="form-label">Content*</label>
                        <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="6" >{{ old('content', $post->content) }}</textarea>

                    {{-- Controllo Validaznione metodo 2 --}}

                        @error('content')
                            <p class="feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="pubblication_date" class="form-label">Pubblication Date*</label>
                        <input class="form-control" type="text" disabled id="pubblication_date" name="pubblication_date" placeholder="{{ date('Y-m-d') }}">

                        {{-- <p>Pubblication Date</p>
                        <span>{{ $now }}</span> --}}

                    
                    </div>

                    {{-- Controllo Validazione metodo 2 --}}

                    @error('pubblication_date')
                        <p class="invalid feedback">{{ $message }}</p>
                    @enderror

                    

                    {{-- Non utilizzo la a --}}
                    <button class="btn btn-warning"type="submit">Edit</button>
                    
                
                
                </form>
            
            </div>
        
        
        </div>

    </div>
    
@endsection
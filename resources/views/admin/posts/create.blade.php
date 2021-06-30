@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>


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




                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('POST')

                    {{-- Title --}}
                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="" value="{{ old('title') }}">


                    {{-- Controllo Validaznione metodo 2 --}}
                        @error('title')
                        <p class="feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- Content --}}
                    <div class="mb-3">
                    {{-- Metto * per far capire che sono campi obbligatori --}}
                        <label for="content" class="form-label">Content*</label>
                        <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="6" >{{ old('content') }}</textarea>

                    {{-- Controllo Validaznione metodo 2 --}}

                        @error('content')
                            <p class="feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Category --}}
                    <div class="mb-3">
                        {{-- Non obbligatoria perchè abbiamo possibilità del null --}}
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('content') is-invalid @enderror">

                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                @if ($category->id == old('category_id')) selected @endif>
                                    {{ $category->name}}
                                </option>
                            @endforeach
                        </select>
                    
                    </div>
                        
                    {{-- Pubblication Date --}}
                    <div class="mb-3">
                    
                        <label for="pubblication_date" class="form-label">Pubblication Date</label>
                        <input class="form-control" type="text" disabled id="pubblication_date" name="pubblication_date" placeholder="{{ $now }}">

                        {{-- <p>Pubblication Date</p>
                        <span>{{ $now }}</span> --}}
                    </div>

                    {{-- Controllo Validazione metodo 2 --}}

                    @error('pubblication_date')
                        <p class="invalid feedback">{{ $message }}</p>
                    @enderror

                    {{-- Tags --}}

                    <h4>Tags</h4>

                    <div class="mb-3">
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{ $tag->id }}"
                                @if (in_array($tag->id, old('tags',[])))
                                    checked
                                @endif
                                >

                                <label for="tag{{$loop->iteration}}">{{ $tag->name }}</label>
                            </span>
                            
                        @endforeach

                        
                    @error('tags')
                        <p class="invalid feedback">{{ $message }}</p>
                    @enderror

                    </div>

                    {{-- Post-Image --}}
                    <div class="mb-3">
                        <label for="cover" class="form-label">Post-Image</label>
                        <div>
                            <input type="file" name="cover" id="cover" >
                        </div>
                        @error('cover')
                            <div>{{ $message}}</div>
                        @enderror
                    
                    </div>


                    {{-- Non utilizzo la a --}}
                    <button class="btn btn-danger"type="submit">Create</button>
                    
                
                
                </form>
            
            </div>
        
        
        </div>

    </div>
    
@endsection
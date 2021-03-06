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




                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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
                        {{-- Non obbligatoria perch?? abbiamo possibilit?? del null --}}
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                @if ($category->id == old('category_id', $post->category_id)) selected @endif>
                                    {{ $category->name}}
                                </option>
                            @endforeach

                        </select>
                    
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

                    <div class="mb-3">
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="tags[]" id="tag{{$loop->iteration}}" value="{{ $tag->id }}"
                                @if ($errors->any() && in_array($tag->id, old('tags')))
                                    checked
                                @elseif(! $errors->any() && $post->tags->contains($tag->id))
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
                    <div>
                        <label for="cover" class="form-label">Post-Image</label>
                    </div>

                    @if ($post->cover)
                        <div class="mb-3">
                            <div>Preview</div>
                            <img width="200" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title}}">
                        </div>
                    @endif
                    

                    <div>
                        <input type="file" name="cover" id="cover" >
                    </div>
                    @error('cover')
                        <div>{{ $message}}</div>
                    @enderror
                    
                    </div>

                    

                    {{-- Non utilizzo la a --}}
                    <button class="btn btn-warning"type="submit">Edit</button>
                    
                
                
                </form>
            
            </div>
        
        
        </div>

    </div>
    
@endsection
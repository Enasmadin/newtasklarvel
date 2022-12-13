@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('Edit_Posts') }}</h1>


                        <form action="{{ route('posts.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label text-primary">{{ __('title') }}</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                    value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="author" class="form-label text-primary">{{ __('author') }}</label>
                                <input type="text" name="author"
                                    class="form-control @error('author') is-invalid @enderror" id="author"
                                    value="{{ old('author', $post->author) }}">
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="content" class="form-label text-primary">{{ __('content') }}</label>
                                <input type="text" name="content"
                                    class="form-control @error('content') is-invalid @enderror" id="content"
                                    value="{{ old('content', $post->content) }}">
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label text-primary">{{ _('put picture') }}</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                    id="image"  value="{{ $post->image ? asset('image_for_web') . '/' . $post->image : old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                         

                    
                            <div class="col-12 text-end">
                               
                                <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('add post') }}</h1>

                        <div class="container">
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label text-primary">{{ __('title') }}</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title') }}" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="author" class="form-label text-primary">{{ __('author') }}</label>
                                    <textarea type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                                        id="author">{{ old('author') }}</textarea>

                                    @error('author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="content" class="form-label text-primary">{{ __('content') }}</label>
                                    <input type="text" name="content"
                                        class="form-control  @error('from') is-invalid @enderror" id="content"
                                        value="{{ old('content') }}">
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label text-primary">{{ __('add picture') }}</label>
                                    <input type="file" name="image"
                                        class="form-control  @error('image') is-invalid @enderror" id="image"
                                        value="{{ old('image') }}">
                                  
                                    <div class="small text-muted mt-2">
                                        {{ __('الصورة يجب ألا تتعدى 50 ميجابايت') }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label text-primary">date </label>
                                    <input type="date" value="{{ date("Y-m-d"); }}"
                                        class="form-control @error('post_date') is-invalid @enderror" id="post_date"
                                        name="post_date">
                                    @error('post_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="d-flex justify-content-between my-5">
                                    <div class="text-end">
                                        <a href="{{ route('posts.index') }}"
                                            class="btn btn-outline-secondary">{{ __('show') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('add') }}</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

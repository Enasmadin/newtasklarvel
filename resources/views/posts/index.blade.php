@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($posts->count() == 0)
            <h3 class="mb-3">{{ __('لا توجد منشورات') }}</h3>

            @auth
               
                <a class="btn btn-primary" href="{{ route('posts.create') }}">{{ __('اضف منشورا جديدا') }}</a>
              
            @endauth
        @else
             
        <div class="container pb-3 mt-5">
            <div class="d-grid gap-3">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-sm-12 col-md-4 col-lg-2 offset-sm-2 offset-md-0 offset-lg-0 mb-4" style="width: 23rem;">
                            <div class="card shadow-sm text-center h-100">
                               
    
                                <div class="card-body">
                                    <h1 style="color: #007EA7">{{ $post->title }}</h1>
                                   
                                    <p class="card-text">
                                        <span class="text-muted">
                                            {{ __(' author ') }}
                                        </span>
                                        {{ $post->author }}
                                    </p>
                                    <p class="card-text">
                                        <span class="text-muted">{{ __('contant ') }}
                                        </span>
                                        {{ $post->content }}
                                    </p>
                                    {{-- <p class="card-text" >
                                        <span class="text-muted">{{ __('date ') }}
                                        </span>
                                        {{ $post->post->post_date }}
                                    </p> --}}
    
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">
                                            {{ __('show') }}
                                        </a>
                                       
                                        @auth
    
                                            @if (auth()->user()->id === $post->user_id)
                                                <a class="btn btn-outline-primary" href="{{ route('posts.edit', $post->id) }}">
                                                    {{ __('تعديل') }}
                                                </a>
                                                <a class="btn btn-outline-danger" href="{{ route('posts.destroy', $post->id) }}"
                                                    onclick="event.preventDefault();
                                            document.getElementById('delete{{ $post->id }}').submit();">
    
                                                    حذف
                                                </a>
                                                <form id="delete{{ $post->id }}"
                                                    action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-none">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            @endif
                                        @endauth
                                        
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>



   
@endsection
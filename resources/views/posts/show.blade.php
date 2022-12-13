@extends('layouts.app')

@section('links')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
  integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> --}}
@endsection


@section('content')
    <div class="container">
       
        <!-- Main content -->
        <section class="content text-center">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <div class="col-12">
                                {{-- <img src="{{ asset('productpic' . '/' . $post->product->product_pic) }}"
                                    class="product-image img-fluid w-100" alt="Product Image"> --}}
                            </div>

                        </div>
                        <div class="col-12 col-sm-6 text-right">
                            <p class="mx-4">{{ $post->author }}</p>
                          
                           

                            <hr class="m-4">
                            <h4 class="text-primary text-center m-4">details</h4>
                            <div class="mx-4">
                                {{-- <h6><span class="text-primary"> date:</span> {{ $post->dateit }}</h6> --}}
                                <h6><span class="text-primary"> title:</span> {{ $post->title }}</h6>
                                <h6><span class="text-primary"> content:</span> {{ $post->content }} 
                                </h6>
                            </div>

       
    
    <div class="container">
        @auth
           
            <div class="row mt-5 mb-3">
                <div class="col-sm-7 offset-sm-3 offset-md-0 ">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#addcomment" role="button" aria-expanded="false"
                        aria-controls="addcomment">
                        {{ __('add comment') }}
                    </a>
                </div>
            </div>
            <div class="row ">
                <div class="col col-md-12 ">
                    <div class="collapse multi-collapse" id="addcomment">
                        <div class="card card-body">
                            <!-- store comment -->
                            <form class="row g-3" method="POST" action="{{ route('comments.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                               
                                <div class="col-12">
                                    <label for="name" class="form-label text-primary"> add comment</label>
                                    <input value="{{ old('comment') }}" type="text"
                                        class="form-control @error('comment') is-invalid @enderror" id="comment"
                                        name="comment">
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                            <!-- end store comment -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        @endauth
        <!-- end comment button -->

        <section>
            <div class="row text-right ">
                @foreach ($comments as $comment)
                    <div class="col-sm-12 my-2">
                        <div class="card">
                            
                                <p class="card-text text-center">
                                    <span class="text-muted"> comment:</span>
                                    &nbsp; {{ $comment->comment }}
                                </p>

                                @auth
                                  
                                    @if (auth()->user()->id === $comment->user_id)
                                        <div class="d-flex justify-content-end">
                                            
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post"
                                                class="mb-3 m-auto " >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger"> delete </button>
                                            </form>

                                        </div>
                                    @endif
                                 
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endsection


    @section('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> --}}
        {{-- <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    @endsection
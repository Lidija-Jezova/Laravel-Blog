@extends('layouts.app')

@section('content')

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    
                    <div class="card-body">

                        <h4 class="card-title">All Posts</h4>

                        @foreach ($posts as $post)
                            <div class="card">
                                <h5 class="card-header">{{ $post->title }}</h5>
                                <div class="card-body">
                                  <p class="card-text">{{ $post->body }}</p>
                                  <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>

                                  <form method="post" action="/posts/{{ $post->id }}">
                                    <!-- here the '1' is the id of the post which you want to delete -->
                                
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                </div>
                              </div>
                        @endforeach

                    </div>
    
                </div>
            </div>
        </div>
    </div>

@endsection


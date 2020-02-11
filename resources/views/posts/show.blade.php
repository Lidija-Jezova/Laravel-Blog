@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">{{ $post->title }}</h5>
                <div class="card-body">
                  <p class="card-text">{{ $post->body }}</p>
                  <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>
                </div>
                <div class="container">
                  @comments(['model' => $post])
                </div>              
            </div>
        </div>
    </div>
</div>

@endsection
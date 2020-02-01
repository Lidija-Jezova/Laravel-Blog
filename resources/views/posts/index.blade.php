@extends('layouts.app')

@section('content')

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">  
                <div class="card-body">

                    <h3 class="card-title">All Posts</h3>

                    <div class="card">                          
                        <ul class="list-group list-group-flush">
                            @foreach ($posts as $post)        

                            <li class="list-group-item">

                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text text-muted text-right"><small>{{ $post->created_at }}</small></p>

                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary float-left">Edit Post</a>

                            @can('delete', Post::class)
                                <form method="post" action="/posts/{{ $post->id }}">                           
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}                    
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                                </form>  
                            @endcan
                            

                            </li>
                                
                            @endforeach
                        </ul>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

@endsection


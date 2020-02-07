@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Update Post</h4>

                    <form method="POST" action="/posts/{{ $post->id }}">
                        @method('PUT')
                        @csrf
                        <div class="field">
                            <label class="label" for="title">Title</label>
                
                            <div class="control">
                                <input class="input" type="text"  name="title" id="title" value="{{ old('title', $post->title) }}">
                                @if ($errors->has('title'))
                                <div class="text-danger">
                                <p>{{ $errors->first('title') }}</p>
                                </div> 
                                @endif 
                            </div>
                        </div>
                
                        <div class="field">
                            <label class="label" for="body">Body</label>
                
                            <div class="control">
                                <textarea class="textarea" name="body" id="body">{{ old('body', $post->body) }}</textarea>
                                    @if ($errors->has('body'))
                                    <div class="text-danger">
                                    <p>{{ $errors->first('body') }}</p>
                                    </div> 
                                    @endif
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
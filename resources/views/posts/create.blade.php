@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    
                    <div class="card-body">

                        <h4 class="card-title">Add a New Post!</h4>

                        <form method="POST" action="/posts">
                            @csrf
                            <div class="field form-group">
                                <label class="label" for="title">Title</label>
                    
                                <div class="control">
                                <input class="input form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" type="text"  name="title" id="title">                            
                                    @if ($errors->has('title'))
                                    <div class="invalid-feedback">
                                    <p>{{ $errors->first('title') }}</p>
                                    </div> 
                                    @endif                                                                    
                                </div>
                            </div>
                    
                            <div class="field form-group">
                                <label class="label" for="body">Body</label>
                    
                                <div class="control">
                                <textarea class="textarea form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body"></textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                    <p>{{ $errors->first('body') }}</p>
                                    </div> 
                                    @endif
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>

@endsection
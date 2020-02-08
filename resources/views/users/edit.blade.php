@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Update Post</h4>

                    <form method="POST" action="{{ route('attach.role', $user) }}">
                        
                        @csrf
                        @foreach ($roles as $role)
                            <input type="radio" name="roles[]" value="{{ $role->id }}">{{ $role->description }}<br>
                        @endforeach
                        <div class="control">
                            <button class="button is-link" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
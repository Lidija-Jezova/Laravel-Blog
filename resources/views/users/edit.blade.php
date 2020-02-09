@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Update User</h4>

                    <form method="POST" action="{{ route('attach.role', $user) }}">                        
                        @csrf
                        @foreach ($allRoles as $role)
                            <input type="radio" name="allRoles[]" value="{{ $role->id }}">{{ $role->description }}<br>
                        @endforeach
                        <div class="control">
                            <button class="button is-link" type="submit">Submit</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('detach.role', $user) }}">                        
                        @csrf
                        @foreach ($user->roles as $role)
                            <input type="radio" name="role" value="{{ $role->id }}">{{ $role->description }}<br>
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
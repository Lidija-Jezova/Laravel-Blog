@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                <div class="card-title">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px">
                    <h2>{{ $user->name }}'s Profile</h2>
                </div>

                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        @csrf

                        <h5>Update Profile Image</h5>
                        <input type="file" name="avatar">
                        <button type="submit" class="float-right btn-small btn btn-primary">Update</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

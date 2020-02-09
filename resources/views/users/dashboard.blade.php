@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Admin Panel</h1>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>           
        @foreach ($users as $user)
        <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @foreach ($user->roles as $role)
            @if ($role->name == 'regular_user')
            <div class="badge badge-secondary">  
                {{ $role->name }} 
            </div>
            @elseif($role->name == 'moderator')
            <div class="badge badge-primary">
                {{ $role->name }} 
            </div>
            @else
            <div class="badge badge-danger">
                {{ $role->name }} 
            </div>
            @endif
            @endforeach 
        </td>
        <td><a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Details</a></td>
        <tr>
        @endforeach
        </tbody>
      </table>
</div>

@endsection
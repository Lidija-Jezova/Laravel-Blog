@extends('layouts.app')

@section('content')
    Users Dashboard
    @foreach ($users as $user)
        {{ $user }}
    @endforeach
@endsection
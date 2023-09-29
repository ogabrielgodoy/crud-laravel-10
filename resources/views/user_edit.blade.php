@extends('master')
@section('content')

<h2>Editar usuário</h2>

@if (session()->has('message'))
{{session()->get('message')}}
@endif

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="firstname" value="{{ $user->firstname }}">
    <input type="text" name="lastname" value="{{ $user->lastname }}">
    <input type="text" name="image" value="{{ $user->image }}">
    <button type="submit">Update</button>
</form>

@endsection

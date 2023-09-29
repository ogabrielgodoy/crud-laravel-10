@extends('master')
@section('content')

<h2>Criar usuário</h2>

@if (session()->has('message'))
{{session()->get('message')}}
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="firstname" placeholder="Nome">
    <input type="text" name="lastname" placeholder="Sobrenome">
    <input type="text" name="image" placeholder="URL DA IMAGEM">
    <button type="submit">Create</button>
</form>

@endsection
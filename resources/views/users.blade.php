@extends('master')
@section('content')

<h2>Lista de usuários</h2>

<td><a href="{{ route('users.create') }}">Create</a></td>

<hr>
<table>
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Imagem</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        <td><img src="{{ $user->image }}" height="40px"></td>
        <td><a href="{{ route('users.show',['user' => $user->id]) }}">Show</a></td>
        <td><a href="{{ route('users.edit',['user' => $user->id]) }}">Edit</a></td>
    </tr>
    
    @endforeach
    </table>
    @endsection
@extends('layouts.app')
@section('Titulli','Perdoruesit Index')
@section('users','active  bg-dark text-light')
@section('content')
<div class="container">
<div class="row">
<h1 class="h1">Perdoruesit</h1>

</div>
<div class="row">
<a class="mb-2 btn btn-success" href="/users/create">Shto Perdorues</a>
</div><div class="row">
<table class="table table-stripped">
<thead>
    <th>Emri Mbiemri</th>
    <th>E-mail</th>
    <th>Data</th>
    <th>Admin</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td>@if($user->isAdmin == true)
                Po
            @else
                Jo
            @endif
        </td>
        <td>
        <a class="btn btn-secondary" href="/users/{{$user->id}}">Shiko</a>
        <a class="btn btn-primary" href="/users/{{$user->id}}/edit">Ndrysho</a>
        <form class="d-inline" method="POST" action="{{route('users.destroy',$user->id)}}">
            @csrf
            @method('Delete')
        <button class="btn btn-danger" type="submit">Fshij</button>
        </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>


@endsection

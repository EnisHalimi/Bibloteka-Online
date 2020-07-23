@extends('layouts.app')
@section('Titulli','Shiko Perdorues')
@section('users','active  bg-dark text-light')
@section('content')
<div class="container">
<h1 class="h1">Perdoruesi {{$user->name}}</h1>
<a class="btn btn-success" href="/users/create">Shto Perdorues</a>
<table class="table table-stripped">
<tbody>
    <tr>
        <th>Emri Mbiemri</th>
    <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>E-mail</th>
    <td>{{$user->email}}</td>
    </tr>
    <tr>
        <th>Admin</th>
    <td>@if($user->isAdmin) Po @else Jo @endif</td>
    </tr>
    <tr>
        <th>Data</th>
    <td>{{$user->created_at}}</td>
    </tr>
</tbody>
</table>

<h2>Kartoni</h2>
<table class="table table-stripped">
<thead>
    <th>ISBN</th>
    <th>Titulli</th>
    <th>Zhanri</th>
    <th>Data e marrjes</th>
    <th>Data e kthimit</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($user->libris as $libri)
    <tr>
    <td>{{$libri->ISBN}}</td>
        <td>{{$libri->titulli}}</td>
        <td>{{$libri->created_at}}</td>
        <td>{{$libri->pivot->data_e_marrjes}}</td>
        <td>{{$libri->pivot->afati}}</td>
        <td>
        <a class="btn btn-secondary" href="/libri/{{$libri->id}}">Shiko</a>
        <a class="btn btn-primary" href="/libri/{{$libri->id}}/edit">Ndrysho</a>
        <form class="d-inline" method="POST" action="{{route('libri.destroy',$libri->id)}}">
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


@endsection

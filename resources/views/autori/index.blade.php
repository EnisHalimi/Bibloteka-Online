@extends('layouts.app')
@section('Titulli','Autori Index')
@section('autor','active bg-dark text-light')
@section('content')
<div class="container">
<div class="row">
<h1 class="h1">Autoret</h1>

</div>
<div class="row">
<a class="mb-2 btn btn-success" href="/autor/create">Shto Autor</a>
</div><div class="row">
<table class="table table-stripped">
<thead>
    <th>Emri</th>
    <th>Periudha</th>
    <th>Data</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($autoret as $autori)
    <tr>
    <td>{{$autori->name}}</td>
        <td>{{$autori->periudha}}</td>
        <td>{{$autori->created_at}}</td>
        <td>
        <a class="btn btn-secondary" href="/autor/{{$autori->id}}">Shiko</a>
        <a class="btn btn-primary" href="/autor/{{$autori->id}}/edit">Ndrysho</a>
        <form class="d-inline" method="POST" action="{{route('autor.destroy',$autori->id)}}">
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

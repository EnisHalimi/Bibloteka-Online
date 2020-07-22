@extends('layouts.app')
@section('Titulli','Libri Index')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">
<div class="row">
<h1 class="h1">Librat</h1>

</div>
<div class="row">
<a class="mb-2 btn btn-success" href="/libri/create">Shto Liber</a>
</div><div class="row">
<table class="table table-stripped">
<thead>
    <th>ISBN</th>
    <th>Titulli</th>
    <th>Stoku</th>
    <th>Data</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($librat as $libri)
    <tr>
    <td>{{$libri->ISBN}}</td>
        <td>{{$libri->titulli}}</td>
        <td>{{$libri->stoku}}</td>
        <td>{{$libri->created_at}}</td>
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
</div>


@endsection

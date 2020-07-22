@extends('layouts.app')
@section('Titulli','Libri Index')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">
<h1 class="h1">Libri {{$libri->titulli}}</h1>
<a class="btn btn-success" href="/libri/create">Shto Liber</a>
<table class="table table-stripped">
<tbody>
    <tr>
        <th>ISBN</th>
    <td>{{$libri->ISBN}}</td>
    </tr>
    <tr>
        <th>Titulli</th>
    <td>{{$libri->titulli}}</td>
    </tr>
    <tr>
        <th>Stoku</th>
    <td>{{$libri->stoku}}</td>
    </tr>
    <tr>
        <th>Zhanri</th>
    <td></td>
    </tr>
    <tr>
        <th>Autori</th>
    <td></td>
    </tr>
</tbody>
</table>
</div>


@endsection

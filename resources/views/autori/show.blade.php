@extends('layouts.app')
@section('Titulli','Shiko Autor')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container">
<h1 class="h1">Autori {{$autori->name}}</h1>
<table class="table table-stripped">
<tbody>
    <tr>
        <th>Emri Mbiemri</th>
    <td>{{$autori->name}}</td>
    </tr>
    <tr>
        <th>Periudha</th>
    <td>{{$autori->periudha}}</td>
    </tr>
</tbody>
</table>
</div>


@endsection

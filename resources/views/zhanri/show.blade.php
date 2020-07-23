@extends('layouts.app')
@section('Titulli','Shiko Zhaner')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
<h1 class="h1">Zhanri {{$zhanri->titulli}}</h1>
<table class="table table-stripped">
<tbody>
    <tr>
        <th>Titulli</th>
    <td>{{$zhanri->titulli}}</td>
    </tr>
    <tr>
        <th>Data</th>
    <td>{{$zhanri->created_at}}</td>
    </tr>
</tbody>
</table>
</div>


@endsection

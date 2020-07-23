@extends('layouts.app')
@section('Titulli','Zhanri Index')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
<div class="row">
<h1 class="h1">Zhanret</h1>

</div>
<div class="row">
<a class="mb-2 btn btn-success" href="/zhaner/create">Shto Zhaner</a>
</div><div class="row">
<table class="table table-stripped">
<thead>
    <th>Titulli</th>
    <th>Data</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($zhanret as $zhanri)
    <tr>
        <td>{{$zhanri->titulli}}</td>
        <td>{{$zhanri->created_at}}</td>
        <td>
        <a class="btn btn-secondary" href="/zhaner/{{$zhanri->id}}">Shiko</a>
        <a class="btn btn-primary" href="/zhaner/{{$zhanri->id}}/edit">Ndrysho</a>
        <form class="d-inline" method="POST" action="{{route('zhaner.destroy',$zhanri->id)}}">
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

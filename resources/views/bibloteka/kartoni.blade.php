@extends('layouts.app')
@section('Titulli','Shiko Kartonin')
@section('kartoni','active')
@section('content')
<div class="container">

<h2>Kartoni i përdoruesit {{$user->name}}</h2>
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

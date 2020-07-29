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
    <th>Kthyer</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($user->libris as $libri)
    <tr>
    <td>{{$libri->ISBN}}</td>
        <td>{{$libri->titulli}}</td>
        <td>@foreach($libri->zhanris as $zhanri)
            {{$zhanri->titulli}}
            @if (!$loop->last)
                ,
            @endif
        @endforeach</td>
        <td>{{$libri->pivot->data_e_marrjes}}</td>
        <td>{{$libri->pivot->afati}}</td>
        <td>@if($libri->pivot->kthyer) Po @else Jo @endif</td>
        <td>
        <form class="d-inline" method="POST" action="{{route('return')}}">
            @csrf
            <input id="id" hidden name="id" value="{{$libri->pivot->id}}">
            <button class="btn @if($libri->pivot->kthyer)  btn-danger @else btn-primary @endif" @if($libri->pivot->kthyer) disabled @else @endif type="submit"><i class="fa fa-chevron-left"></i> Kthe Librin</button>
        </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection

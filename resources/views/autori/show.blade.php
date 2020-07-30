@extends('layouts.app')
@section('Titulli','Shiko Autor')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container">
    <h1 class="h1 mb-5">Autori {{$autori->name}}</h1>
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
    <tr>
        <th>Data e lindjes</th>
    <td>{{$autori->ditelindja}}</td>
    </tr>
    <tr>
        <th>Biografia</th>
    <td>{{$autori->biografia}}</td>
    </tr>
    <tr>
        <th>Fotografia</th>
    <td><img src="{{asset('img/'.$autori->foto.'')}}" class="img-fluid"></td>
    </tr>
</tbody>
</table>
@if(auth()->user()->isAdmin)
<hr>

<a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
    <a href="/autor/{{$autori->id}}/edit"  class="btn  btn-primary"><i class="fa fa-pen"></i> Ndrysho</a>
    <button class="btn btn-circle btn-danger" data-toggle="modal" data-target="#fshijModal{{$autori->id}}"><i class="fa fa-trash"></i> Fshij</button>
    <div class="modal fade" id="fshijModal{{$autori->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$autori->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fshijModalLabel{{$autori->id}}">Fshij autorin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    A jeni i sigurtë që doni të vazhdoni?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Anulo</button>
                    <form class="d-inline" method="POST" action="{{ route('autor.destroy',$autori->id)}}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn  btn-danger"><i class="fa fa-trash"></i>Fshij</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @else
    @endif

    <h2>Librat</h2>
    <table class="table table-stripped">
    <thead>
        <th>ISBN</th>
        <th>Titulli</th>
        <th>Zhanri</th>
        <th>Menaxhimi</th>
    </thead>
    <tbody>
        @foreach($librat as $libri)
        <tr>
        <td>{{$libri->ISBN}}</td>
            <td>{{$libri->titulli}}</td>
            <td>@foreach($libri->zhanris as $zhanri)
                {{$zhanri->titulli}}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach</td>

            <td>
            <a class="btn btn-secondary" href="/libri/{{$libri->id}}"><i class="fa fa-eye"></i> Shiko</a>
            </td>

        </tr>
        @endforeach
    </tbody>
    </table>
    {{$librat->links()}}
</div>


@endsection

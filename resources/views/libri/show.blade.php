@extends('layouts.app')
@section('Titulli','Libri Index')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">
<h1 class="h1 mb-5">Libri {{$libri->titulli}}</h1>
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
        <th>Zhanret</th>
    <td>@foreach($libri->zhanris as $zhanri)
            {{$zhanri->titulli}}
            @if (!$loop->last)
                ,
            @endif
        @endforeach</td>
    </tr>
    <tr>
        <th>Autoret</th>
    <td>@foreach($libri->autors as $autor)
        {{$autor->name}}
        @if (!$loop->last)
            ,
        @endif
    @endforeach</td>
    </tr>
    <tr>
        <th>Kopertina</th>
    <td><img src="{{asset('img/'.$libri->foto.'')}}" class="img-fluid"> </td>
    </tr>
</tbody>
</table>
<hr>
    <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
    <a href="/libri/{{$libri->id}}/edit"  class="btn  btn-primary"><i class="fa fa-pen"></i> Ndrysho</a>
    <button class="btn btn-circle btn-danger" data-toggle="modal" data-target="#fshijModal{{$libri->id}}"><i class="fa fa-trash"></i> Fshij</button>
    <div class="modal fade" id="fshijModal{{$libri->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$libri->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fshijModalLabel{{$libri->id}}">Fshij Librin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    A jeni i sigurtë që doni të vazhdoni?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Anulo</button>
                    <form class="d-inline" method="POST" action="{{ route('libri.destroy',$libri->id)}}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn  btn-danger"><i class="fa fa-trash"></i>Fshij</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection

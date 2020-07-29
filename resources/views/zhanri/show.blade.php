@extends('layouts.app')
@section('Titulli','Shiko Zhaner')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
    <h1 class="h1 mb-5">Zhanri {{$zhanri->titulli}}</h1>
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
<hr>
<a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
        <a class="btn btn-primary" href="/zhaner/{{$zhanri->id}}/edit"> <i class="fa fa-pen"></i> Ndrysho</a>
        <button class="btn btn-circle btn-danger" data-toggle="modal" data-target="#fshijModal{{$zhanri->id}}"><i class="fa fa-trash"></i> Fshij</button>
        <div class="modal fade" id="fshijModal{{$zhanri->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$zhanri->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fshijModalLabel{{$zhanri->id}}">Fshij Zhanrin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        A jeni i sigurtë që doni të vazhdoni?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Anulo</button>
                        <form class="d-inline" method="POST" action="{{ route('zhaner.destroy',$zhanri->id)}}" accept-charset="UTF-8">
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

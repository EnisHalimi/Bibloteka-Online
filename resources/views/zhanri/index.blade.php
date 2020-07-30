@extends('layouts.app')
@section('Titulli','Zhanret')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6">
            <h1 class="h1">Zhanret</h1>
        </div>
        <div class="col-md-6 justify-content-end">
            <a class="mb-2 btn btn-success float-right" href="/zhaner/create"><i class="fa fa-plus"></i> Shto Zhaner</a>
        </div>
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
        <a class="btn btn-secondary" href="/zhaner/{{$zhanri->id}}"><i class="fa fa-eye"></i> Shiko</a>
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
        </td>

    </tr>
    @endforeach
</tbody>
</table>
{{$zhanret->links()}}
</div>
</div>


@endsection

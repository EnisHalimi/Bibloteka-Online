@extends('layouts.app')
@section('Titulli','Autoret')
@section('autor','active bg-dark text-light')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6">
            <h1 class="h1">Autoret</h1>
        </div>
        <div class="col-md-6 justify-content-end">
            <a class="mb-2 btn btn-success float-right" href="/autor/create"><i class="fa fa-plus"></i> Shto Autor</a>
        </div>
    </div>
<div class="row">
<table class="table table-stripped">
<thead>
    <th>Emri</th>
    <th>Periudha</th>
    <th>Data e lindjes</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($autoret as $autori)
    <tr>
    <td>{{$autori->name}}</td>
        <td>{{$autori->periudha}}</td>
        <td>{{$autori->ditelindja}}</td>
        <td>
            <a class="btn btn-secondary" href="/autor/{{$autori->id}}"><i class="fa fa-eye"></i> Shiko</a>
            <a class="btn btn-primary" href="/autor/{{$autori->id}}/edit"><i class="fa fa-pen"></i> Ndrysho</a>
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
        </td>

    </tr>
    @endforeach
</tbody>
</table>
{{ $autoret->links() }}
</div>
</div>


@endsection

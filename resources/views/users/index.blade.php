@extends('layouts.app')
@section('Titulli','Perdoruesit')
@section('users','active  bg-dark text-light')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-6">
            <h1 class="h1">Perdoruesit</h1>
        </div>
        <div class="col-md-6 justify-content-end">
            <a class="mb-2 btn btn-success float-right" href="/users/create"><i class="fa fa-plus"></i> Shto Perdorues</a>
        </div>


    </div><div class="row">
<table class="table table-stripped">
<thead>
    <th>Emri Mbiemri</th>
    <th>E-mail</th>
    <th>Data</th>
    <th>Admin</th>
    <th>Menaxhimi</th>
</thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td>@if($user->isAdmin == true)
                Po
            @else
                Jo
            @endif
        </td>
        <td>
            <a class="btn btn-secondary" href="/users/{{$user->id}}"><i class="fa fa-eye"></i> Shiko</a>
            <a class="btn btn-primary" href="/users/{{$user->id}}/edit"><i class="fa fa-pen"></i> Ndrysho</a>
            <button class="btn btn-circle btn-danger" data-toggle="modal" data-target="#fshijModal{{$user->id}}"><i class="fa fa-trash"></i> Fshij</button>
            <div class="modal fade" id="fshijModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fshijModalLabel{{$user->id}}">Fshij Perdoruesin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            A jeni i sigurtë që doni të vazhdoni?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>Anulo</button>
                            <form class="d-inline" method="POST" action="{{ route('users.destroy',$user->id)}}" accept-charset="UTF-8">
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
{{$users->links()}}
</div>
</div>


@endsection

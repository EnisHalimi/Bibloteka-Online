@extends('layouts.app')
@section('Titulli','Kryefaqja')
@section('content')
<div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h3 class="my-4">Zhanret</h3>
        <div class="list-group">
            @foreach($zhanret as $zhanri)
                <a href="#" class="list-group-item">{{$zhanri->titulli}}</a>
            @endforeach
        </div>



      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <h2>Librat</h2>
        <div class="row">

            @foreach($librat as $libri)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="{{asset('img/'.$libri->foto.'')}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  {{$libri->titulli}}
                </h4>
                <h6><em>@foreach($libri->autors as $autor)
                    {{$autor->name}}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach </em></h6>
                <p class="card-text text-muted"> @foreach($libri->zhanris as $zhanri)
                    {{$zhanri->titulli}}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach</p>
              </div>
              <div class="card-footer">
                <form class="d-inline" method="POST" action="{{route('rent')}}">
                    @csrf
                    <input id="id" hidden name="id" value="{{$libri->id}}">
                    <button class="btn @if($libri->stoku == 0)  btn-danger @else btn-primary @endif" @if($libri->stoku == 0) disabled @else @endif type="submit"><i class="fa fa-plus"></i> Merr me qira</button>
                </form>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
@endsection

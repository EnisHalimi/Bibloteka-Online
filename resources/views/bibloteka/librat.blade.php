@extends('layouts.app')
@section('Titulli','Librat')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
        <h2>Librat</h2>
        </div>
        <div class="col-md-2">
            </div>
        <div class="col-md-4 justify-content-end">
            <form class="form" action="{{route('libriSearch')}}" type="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" required placeholder="Kerko..." aria-label="Kerko..." aria-describedby="kerko">
                    <div class="input-group-append">
                        <button type="submit"  class="btn btn-primary" >
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                  </div>
                </form>
        </div>
        <div class="row mt-3">

            @foreach($librat as $libri)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="/libri/{{$libri->id}}"><img class="card-img-top" src="{{asset('img/'.$libri->foto.'')}}" alt=""></a>
              <div class="card-body">
                <p class="text-muted">
                    ISBN: {{$libri->ISBN}}
                </p>
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
                <a class="btn btn-secondary float-right" href="/libri/{{$libri->id}}"><i class="fa fa-info"></i> Info</a>

                  <!-- Modal -->

              </div>
            </div>
          </div>
          @endforeach

        </div>
        {{$librat->links()}}
        <!-- /.row -->
    </div>
    <!-- /.row -->

  </div>
@endsection

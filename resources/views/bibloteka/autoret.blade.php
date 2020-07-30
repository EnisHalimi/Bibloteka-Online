@extends('layouts.app')
@section('Titulli','Autoret')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
        <h2>Autoret</h2>
        </div>
        <div class="col-md-2">
            </div>
        <div class="col-md-4 justify-content-end">
            <form class="form" action="{{route('autorSearch')}}" type="POST">
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

            @foreach($autoret as $autor)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="/autor/{{$autor->id}}"><img class="card-img-top" src="{{asset('img/'.$autor->foto.'')}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  {{$autor->name}}
                </h4>
                <h6><em>Ditelindja: {{$autor->ditelindja}}</em></h6>
                <p class="card-text text-muted"> {{$autor->periudha}}</p>
              </div>
              <div class="card-footer">
                <a class="btn btn-secondary float-right" href="/autor/{{$autor->id}}"><i class="fa fa-info"></i> Info</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        {{$autoret->links()}}
        <!-- /.row -->
    </div>
    <!-- /.row -->

  </div>
@endsection

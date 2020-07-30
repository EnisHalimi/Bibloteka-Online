@extends('layouts.app')
@section('Titulli','Zhanret')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
        <h2>Zhanret</h2>
        </div>
        <div class="col-md-2">
            </div>
        <div class="col-md-4 justify-content-end">
            <form class="form" action="{{route('zhanerSearch')}}" type="POST">
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

            @foreach($zhanret as $zhaner)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
            <a href="/zhaner/{{$zhaner->id}}"><img class="card-img-top" src="no-image.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  {{$zhaner->titulli}}
                </h4>
              </div>
              <div class="card-footer">

                <a class="btn btn-secondary float-right" href="/zhaner/{{$zhaner->id}}"><i class="fa fa-info"></i> Info</a>

                  <!-- Modal -->

              </div>
            </div>
          </div>
          @endforeach

        </div>
        {{$zhanret->links()}}
        <!-- /.row -->
    </div>
    <!-- /.row -->

  </div>
@endsection

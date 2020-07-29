@extends('layouts.app')
@section('Titulli','Ndrysho Liber')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">
<h1>Ndrysho Librin: {{$libri->titulli}}</h1>
<form class="form" action="{{route('libri.update',$libri->id)}}" method="POST"  enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
<label for="isbn">ISBN</label>
<input class="form-control" type='number' min="0" name="isbn" id="isbn" value="{{$libri->ISBN}}">
@if ($errors->has('isbn'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('isbn') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="titulli">Titulli</label>
<input class="form-control" type='text' name="titulli" id="titulli" value="{{$libri->titulli}}">
@if ($errors->has('titulli'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('titulli') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="stoku">Stoku</label>
<input  class="form-control" type='number' name="stoku" id="stoku" value="{{$libri->stoku}}">
@if ($errors->has('stoku'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('stoku') }}</small></strong>
</span>
@endif
</div>
<div class="form-group mb-3">
    <label class="text-xs" for="zhanri">Zhanret</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
      <button class="btn btn-outline-primary" type="button"  data-toggle="modal" data-target="#zhanriModal"><i class="fa fa-plus"></i> </button>
    </div>
    <input  hidden id="zhanri-list"  name="Zhanret" value="@foreach($libri->zhanris as $zhanri){{$zhanri->id}},@endforeach" />
  <select readonly  multiple placeholder="Zhanret" class="form-control form-control-user @error('zhanri') is-invalid @enderror" id="zhanri" name="zhanri" >
    @foreach ($libri->zhanris as $zhanri)
    <option>{{$zhanri->titulli}}</option>
    @endforeach
    </select>
    <div class="input-group-append">
        <button type="button" class="btn btn-outline-danger" onclick=" document.getElementById('zhanri-list').value='';
        document.getElementById('zhanri').options.length = 0;" >
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </div>
  <div class="modal fade" id="zhanriModal" tabindex="-1" role="dialog" aria-labelledby="zhanriModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="zhanriModalLabel">Zgjedh Zhanrin</h5>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-hover" id="searchZhanri"  width="100%" cellspacing="0" >
              <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">Titulli</th>
                  <th scope="col">Data</th>
                  <th scope="col">Shto</th>
                </tr>
              </thead>
              <tbody >
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
          </div>
        </div>
      </div>
    </div>
@if ($errors->has('zhanri'))
                  <span class="help-block">
                    <strong class="text-danger"><small>{{ $errors->first('zhanri') }}</small></strong>
                  </span>
@endif

</div>
<div class="form-group mb-3">
    <label class="text-xs" for="autoret">Autoret</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
      <button class="btn btn-outline-primary" type="button"  data-toggle="modal" data-target="#autoretModal"><i class="fa fa-plus"></i> </button>
    </div>
    <input  hidden id="autoret-list"  name="Autoret"  value="@foreach($libri->autors as $autor){{$autor->id}},@endforeach" />
  <select readonly  multiple placeholder="Autoret" class="form-control form-control-user @error('autoret') is-invalid @enderror" id="autoret" name="autoret" >
    @foreach ($libri->autors as $autor)
    <option>{{$autor->name}}</option>
    @endforeach
    </select>
    <div class="input-group-append">
        <button type="button" class="btn btn-outline-danger" onclick=" document.getElementById('autoret-list').value='';
        document.getElementById('autoret').options.length = 0;" >
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </div>
  <div class="modal fade" id="autoretModal" tabindex="-1" role="dialog" aria-labelledby="autoretModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="autoretModalLabel">Zgjedh Autorin</h5>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-hover" id="searchAutori"  width="100%" cellspacing="0" >
              <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">Emri Mbiemri</th>
                  <th scope="col">Periudha</th>
                  <th scope="col">Shto</th>
                </tr>
              </thead>
              <tbody >
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
          </div>
        </div>
      </div>
    </div>
@if ($errors->has('Autoret'))
                  <span class="help-block">
                    <strong class="text-danger"><small>{{ $errors->first('Autoret') }}</small></strong>
                  </span>
@endif

</div>
<div class="form-group">
<label for="foto">Kopertina</label>
    <input type="file" class="form-control" id="foto" name="Foto"  placeholder="Kopertina e Librit">
  @if ($errors->has('Foto'))
                  <span class="help-block">
                    <strong class="text-danger"><small>{{ $errors->first('Foto') }}</small></strong>
                  </span>
@endif
</div>
<div class="form-group">
    <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
<button class="btn btn-success" type="submit"><i class="fa fa-pen"></i> Ndrysho</button>
</div>

</form>
</div>

@endsection

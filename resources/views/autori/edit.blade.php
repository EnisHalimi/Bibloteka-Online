@extends('layouts.app')
@section('Titulli','Ndrysho Autor')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container">
<h1>Ndrysho Autorin: {{$autori->name}}</h1>
<form class="form" action="{{route('autor.update',$autori->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
<label for="name">Emri Mbiemri</label>
<input class="form-control" type='text' name="name" id="name" value="{{$autori->name}}">
@if ($errors->has('name'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('name') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="periudha">Periudha</label>
<input  class="form-control" type='text' name="periudha" id="periudha" value="{{$autori->periudha}}">
@if ($errors->has('periudha'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('periudha') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
    <label for="ditelindja">Data e lindjes</label>
    <input  class="form-control" type='date' name="ditelindja" id="ditelindja" value="{{$autori->ditelindja}}">
    @if ($errors->has('ditelindja'))
    <span class="help-block">
        <strong class="text-danger"><small>{{ $errors->first('ditelindja') }}</small></strong>
    </span>
    @endif
</div>
<div class="form-group">
    <label for="foto">Fotografia</label>
        <input type="file" class="form-control" id="foto" name="Foto"   placeholder="Fotografia e Autorit">
      @if ($errors->has('Foto'))
                      <span class="help-block">
                        <strong class="text-danger"><small>{{ $errors->first('Foto') }}</small></strong>
                      </span>
    @endif
    </div>
    <div class="form-group">
        <label for="biografia">Biografia</label>
        <textarea class="form-control" id="biografia" name="biografia">{{$autori->biografia}}</textarea>
          @if ($errors->has('biografia'))
                          <span class="help-block">
                            <strong class="text-danger"><small>{{ $errors->first('biografia') }}</small></strong>
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

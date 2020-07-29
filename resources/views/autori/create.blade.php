@extends('layouts.app')
@section('Titulli','Krijo Autor')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container py-3">
<h1>Krijo Autor </h1>
<form class="form" action="{{route('autor.store')}}" method="POST"  enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="name">Emri Mbiemri</label>
<input class="form-control" type='text' name="name" id="name" value="{{old('name')}}">
@if ($errors->has('name'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('name') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="periudha">Periudha</label>
<input  class="form-control" type='text' name="periudha" id="periudha" value="{{old('periudha')}}">
@if ($errors->has('periudha'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('periudha') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
    <label for="ditelindja">Data e lindjes</label>
    <input  class="form-control" type='date' name="ditelindja" id="ditelindja" value="{{old('ditelindja')}}">
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
        <textarea class="form-control" id="biografia" name="biografia">{{old('biografia')}}</textarea>
          @if ($errors->has('biografia'))
                          <span class="help-block">
                            <strong class="text-danger"><small>{{ $errors->first('biografia') }}</small></strong>
                          </span>
        @endif
        </div>
<div class="form-group">
    <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
    <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Shto</button>
</div>

</form>
</div>

@endsection

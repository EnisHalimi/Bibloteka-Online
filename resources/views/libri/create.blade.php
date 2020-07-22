@extends('layouts.app')
@section('Titulli','Krijo Liber')
@section('libri','active  bg-dark text-light')
@section('content')
<div class="container">
<form class="form" action="{{route('libri.store')}}" method="POST">
@csrf
<div class="form-group">
<label for="isbn">ISBN</label>
<input class="form-control" type='number' min="0" name="isbn" id="isbn" value="{{old('isbn')}}">
@if ($errors->has('isbn'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('isbn') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="titulli">Titulli</label>
<input class="form-control" type='text' name="titulli" id="titulli" value="{{old('titulli')}}">
@if ($errors->has('titulli'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('titulli') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<label for="stoku">Stoku</label>
<input  class="form-control" type='number' name="stoku" id="stoku" value="{{old('stoku')}}">
@if ($errors->has('stoku'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('stoku') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
    <label for="zhanri">Zhanri</label>
    <input  class="form-control" type='text' name="zhanri" id="zhanri" value="{{old('zhanri')}}">
    </div>
    <div class="form-group">
        <label for="autori">Autori</label>
        <input  class="form-control" type='text' name="autori" id="autori" value="{{old('autori')}}">
        </div>
<div class="form-group">
<button class="btn btn-success" type="submit">Shto</button>
</div>

</form>
</div>

@endsection

@extends('layouts.app')
@section('Titulli','Krijo Autor')
@section('autor','active  bg-dark text-light')
@section('content')
<div class="container">
<form class="form" action="{{route('autor.store')}}" method="POST">
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
<button class="btn btn-success" type="submit">Shto</button>
</div>

</form>
</div>

@endsection

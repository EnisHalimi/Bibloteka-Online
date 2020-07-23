@extends('layouts.app')
@section('Titulli','Krijo Zhaner')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
<form class="form" action="{{route('zhaner.store')}}" method="POST">
@csrf
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
<button class="btn btn-success" type="submit">Shto</button>
</div>

</form>
</div>

@endsection

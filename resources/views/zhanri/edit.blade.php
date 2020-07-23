@extends('layouts.app')
@section('Titulli','Ndrysho Zhaner')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
<form class="form" action="{{route('zhaner.update',$zhanri->id)}}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
<label for="titulli">Titulli</label>
<input class="form-control" type='text' name="titulli" id="titulli" value="{{$zhanri->titulli}}">
@if ($errors->has('titulli'))
<span class="help-block">
    <strong class="text-danger"><small>{{ $errors->first('titulli') }}</small></strong>
</span>
@endif
</div>
<div class="form-group">
<button class="btn btn-success" type="submit">Ndrysho</button>
</div>

</form>
</div>

@endsection

@extends('layouts.app')
@section('Titulli','Ndrysho Zhaner')
@section('zhanri','active  bg-dark text-light')
@section('content')
<div class="container">
<h1>Ndrysho Zhanrin {{$zhanri->titulli}} </h1>
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
    <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
<button class="btn btn-success" type="submit"><i class="fa fa-pen"></i> Ndrysho</button>
</div>

</form>
</div>

@endsection

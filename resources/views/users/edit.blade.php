@extends('layouts.app')
@section('Titulli','Ndrysho Perdorues')
@section('users','active  bg-dark text-light')
@section('content')
<div class="container">
    <h1>Ndrysho Perdoruesin: {{$user->name}}</h1>
    <form method="POST" action="{{ route('users.update',$user->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Emri Mbiemri</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="email" >E-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

        <div class="form-group ">
            <label for="password" >Fjalekalimi</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Perserit Fjalekalimi</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
        </div>

        <div class="form-group">
            <label for="admin" >Administrator</label>

                <input id="admin" @if($user->isAdmin) checked @else @endif type="checkbox" class="form-control" name="admin" >
            @error('admin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group">
            <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-pen"></i> Ndrysho</button>
        </div>
    </form>
</div>

@endsection

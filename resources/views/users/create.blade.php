@extends('layouts.app')
@section('Titulli','Krijo Perdorues')
@section('users','active  bg-dark text-light')
@section('content')
<div class="container py-3">
    <h1>Krijo Perdorues </h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Emri Mbiemri</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="password" >Fjalkalimi</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Perserit Fjalkalimin</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <label for="admin" >Administrator</label>
                <input id="admin" type="checkbox" class="form-control" name="admin" >
            @error('admin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group ">
            <a class="btn btn-secondary" href="{{ url()->previous() }}" ><i class="fa fa-chevron-left"></i> Kthehu</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Shto</button>
            </div>
        </div>
    </form>
</div>

@endsection

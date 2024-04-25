@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header" style="font-size: 20px">
                    {{ __('Login') }}
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted">{{__('Email Adresse')}}</label>
                            <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label text-muted"> {{__('Password')}} </label>
                            <input type="password" name="password" id="password" class="form-control" @error('password') is-invalid @enderror" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                        </div>
                        <a href="{{route('password.request')}}" class="nav-link text-secondary">
                             mot de passe oublié 
                        </a>

                        <button type="submit" class="btn btn-outline-secondary mt-2">Login</button>
                        <div style="float: right; margin-top:10px">
                            <a href="{{route('register')}}" class="nav-link"> creer un compte </a>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection
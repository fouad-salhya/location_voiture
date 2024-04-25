@extends('layouts.app')

@section('content')

 <div class="container mt-5">
     <div class="row justify-content-center">
         <div class="col-md-6 mx-auto">
             <div class="card">
                 <div class="card-header text-center" style="font-size: 20px">
                    {{ __('Register') }}
                 </div>
                 <div class="card-body">
                     <form action="{{route('register')}}" method="POST">
                      @csrf
                     
                      <div class="mb-3">
                        <label for="name" class="form-label text-muted ">{{__('Name')}}</label>
                        <input type="name" class="form-control " id="name"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
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
                      <div class=" mb-3">
                        <label for="password-confirm" class="form-label text-muted">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         
                            <button type="submit" class="btn btn-outline-secondary mt-4">Registre</button>
                            <div style="float: right; margin-top:10px">
                                <a href="{{route('login')}}" class="nav-link"> vous avez deja un compte ? </a>
                             </div>
                    </div>

                
                    </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

@endsection


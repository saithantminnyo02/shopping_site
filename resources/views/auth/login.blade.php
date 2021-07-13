{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.navbar')

@section('content')

<div class="main">

    <!-- Sing in  Form -->
      <section class="sign-in">
          <div class="container">
              <div class="signin-content">
                  <div class="signin-image">
                      <figure><img src="{{ asset('assets/images/signin-image.jpg') }}" alt="sing up image"></figure>
                      <a href="/register" class="signup-image-link" style="color:Red">Create an account</a>
                  </div>

                  <div class="signin-form">
                      <h2 class="form-title">Log In</h2>
                      <form method="POST" class="register-form" id="login-form" action="{{ route('login') }} ">
                          @csrf
                          <div class="form-group">
                              <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input id="email" type="email" placeholder="Your Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="form-group">
                              <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                              <input id="password" type="password" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="form-group">
                              <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" {{ old('remember') ? 'checked' : '' }}/>
                              <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                          </div>
                          <div class="form-group form-button">
                              <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                          </div>
                      </form>
                      {{-- <div class="social-login">
                          <span class="social-label">Or login with</span>
                          <ul class="socials">
                              <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                              <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                              <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                          </ul>
                      </div> --}}
                  </div>
              </div>
          </div>
      </section>



  </div>
    
@endsection
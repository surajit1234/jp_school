@extends('layouts.admin_login')

@section('content')
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-lg-block" style="display: flex !important;align-items: center !important;">
                <!-- <img style="margin-left: 200px  ;" src="{{asset('img/fg-logo.jpg')}}" alt="Frontier Global"/> -->
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                  <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Welcome to Secure Panel</h1>
                  </div>
                  <form method="POST" action="{{ route('admin.login.submit') }}" autocomplete="off" class="user">
                      @csrf
                      <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" required autocomplete="email" placeholder="Enter Email Address..." autofocus>
                        <!-- <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..."> -->
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password" required>
                          <!-- <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"> -->
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input id="customCheck" class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <!-- <input type="checkbox" class="custom-control-input" id="customCheck"> -->
                          <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-danger btn-user btn-block">
                          {{ __('Login') }}
                      </button>
                  </form>
				          <hr>
                  <div class="text-center">
                      <a href="{{ route('admin.password.reset') }}">Forgot Password?</a>
                  </div>
                  <!-- <div class="text-center">
                  <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

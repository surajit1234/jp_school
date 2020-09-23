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
                <img style="margin-left: 200px;" src="{{asset('img/fg-logo.jpg')}}" alt="Frontier Global"/>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
					  <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="user form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<input id="email" type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-danger btn-user btn-block">Reset Password</button>
                            </div>
                        </div>
                    </form>
                    <hr>
					<div class="text-center">
						<a class="small" href="{{ route('show.admin.login') }}">Already have an account? Login!</a>
					</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.guest')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin - Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('../../backend/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('../../backend/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Forgot Password</h3>
                <p class="text-left mb-4">Enter your email to receive a password reset link.</p>
                
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" id="email" name="email" class="form-control p_input" required autofocus>
                        @error('email') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">
                            Send Password Reset Link
                        </button>
                    </div>

                    <p class="sign-up">Remembered your password? 
                        <a href="{{ route('login') }}"> Login</a>
                    </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('../../backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('../../backend/assets/js/todolist.js') }}"></script>
  </body>
</html>
@endsection

@extends('layouts.guest')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Login</h3>

                        <!-- Use the default Breeze login route -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" id="email" name="email" class="form-control p_input" required autofocus>
                                @error('email') 
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" id="password" name="password" class="form-control p_input" required>
                                @error('password') 
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember"> Remember me 
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password</a>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-facebook mr-2 col">
                                    <i class="mdi mdi-facebook"></i> Facebook
                                </button>
                                <button type="button" class="btn btn-google col">
                                    <i class="mdi mdi-google-plus"></i> Google plus
                                </button>
                            </div>

                            <p class="sign-up">
                                Don't have an Account? 
                                <a href="{{ route('register') }}">Sign Up</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

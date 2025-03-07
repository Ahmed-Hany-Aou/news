@extends('layouts.guest')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Register</h3>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Username Field -->
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" id="name" name="name" class="form-control p_input" required autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control p_input" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control p_input" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control p_input" required>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember"> Remember me 
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password</a>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                            </div>

                            <!-- Social Media Buttons -->
                            <div class="d-flex">
                                <button type="button" class="btn btn-facebook col mr-2">
                                    <i class="mdi mdi-facebook"></i> Facebook
                                </button>
                                <button type="button" class="btn btn-google col">
                                    <i class="mdi mdi-google-plus"></i> Google plus
                                </button>
                            </div>

                            <!-- Terms & Conditions -->
                            <p class="terms text-center mt-3">
                                By creating an account you are accepting our 
                                <a href="#">Terms & Conditions</a>
                            </p>

                            <!-- Link to Login Page -->
                            <p class="sign-up text-center">
                                Already have an Account? 
                                <a href="{{ route('login') }}"> Sign In</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection

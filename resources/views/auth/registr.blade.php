@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <!-- Register form -->
    <form class="login-form" action="{{ route('registrSubmit') }}" method="POST">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-pill p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Register to your account:</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Username">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Email">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @error('email')
                        <p style="color: red;">{{ __($message) }}</p>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @error('password')
                        <p style="color: red;">{{ __($message) }}</p>
                    @enderror
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @error('password_confirmation')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>

                <div class="text-center">
                    <a href="login_password_recover.html">Forgot password?</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /Register form -->
@endsection

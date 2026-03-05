@extends('layouts.auth')
@section('title', 'Verify-code')
@section('content')
    <!-- Register form -->
    @if (session()->get('email'))
        <form class="login-form" action="{{ route('verify.code.post', session()->get('email'),  false) }}" method="POST">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i
                            class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Code to your account
                            {{ cache()->get('email_verification_' . session()->get('email')) }}</h5>
                        <span class="d-block text-muted">Enter your credentials below</span>
                    </div>
                    <input type="hidden" name="email" value="{{ session()->get('email') }}" id="">
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="number" name="code" class="form-control" placeholder="Code">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>
                    @error('code')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <div class="text-center">
                        <a href="login_password_recover.html">Forgot password?</a>
                    </div>
                </div>
            </div>
        </form>
    @else
        <a href="/" class="btn btn-info">Home</a>
    @endif
    <!-- /Register form -->
@endsection

@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <!-- Register form -->
    <form class="login-form" action="{{ route('verify.email.post', [], false) }}" method="POST">
        @csrf
        <div class="card mb-0" style="width: 350px;">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Login to your account</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Email">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @error('email')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    @error('g-recaptcha-response')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>

                <div class="text-center">
                    <a href="login_password_recover.html">Forgot password?</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /Register form -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': "{{ config('services.recaptcha.site_key') }}"
            });
        };
    </script>
@endsection

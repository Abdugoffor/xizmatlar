@extends("layouts.app")

@section("content")
    <div class="container">
        <h2>Sign in to your account</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error("email")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                @error("password")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Sign in</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </p>
    </div>
@endsection

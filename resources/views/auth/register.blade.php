@extends("layouts.app")

@section("content")
    <div class="container">
        <h2>Create your account</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error("name")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
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
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit">Register</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            <a href="{{ route('login') }}">Already have an account? Sign in</a>
        </p>
    </div>
@endsection

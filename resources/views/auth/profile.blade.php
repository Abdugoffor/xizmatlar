@extends("layouts.app")

@section("content")
    <div class="container">
        <h2>Edit your profile</h2>
        @if (session("status"))
            <div class="alert">{{ session("status") }}</div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error("name")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                @error("email")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">New Password (optional)</label>
                <input type="password" id="password" name="password">
                @error("password")
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection

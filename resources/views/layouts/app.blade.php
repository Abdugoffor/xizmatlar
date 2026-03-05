<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name", "Laravel") }}</title>
    <link href="{{ asset("auth/css/style.css") }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route("home") }}" class="logo">{{ config("app.name") }}</a>
            @auth
                <div class="dropdown">
                    <button class="dropdown-toggle">{{ Auth::user()->name }}</button>
                    <div class="dropdown-menu">
                        <a href="{{ route("profile") }}">Profile</a>
                        <form method="POST" action="{{ route("logout") }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="nav-links">
                    <a href="{{ route("login") }}">Login</a>
                    <a href="{{ route("register") }}">Register</a>
                </div>
            @endauth
        </nav>
    </header>
    <main>
        @yield("content")
    </main>
    <footer>
        <p>© {{ date("Y") }} {{ config("app.name") }}. All rights reserved.</p>
    </footer>
    <script>
        document.querySelectorAll(".dropdown-toggle").forEach(button => {
            button.addEventListener("click", () => {
                const menu = button.nextElementSibling;
                menu.style.display = menu.style.display === "block" ? "none" : "block";
            });
        });
        document.addEventListener("click", (event) => {
            if (!event.target.closest(".dropdown")) {
                document.querySelectorAll(".dropdown-menu").forEach(menu => {
                    menu.style.display = "none";
                });
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <title>App Transaction History</title>
        
        <link
            href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" type="text/css" href="css/loginRegister.css" />
    </head>
    <body>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true" />

            <div class="signup">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        required
                        autocomplete="off"
                    />
                    @error('username')
                        <span id="error-message" style="display: none;">{{ $message }}</span>
                    @enderror
                    <input
                        type="password"
                        name="password"
                        placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Password' }}"
                        required
                        autocomplete="off"
                    />
                    @error('password')
                        <span id="error-message" style="display: none;">{{ $message }}</span>
                    @enderror
                    <button type="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                @if (session()->has('loginErorr'))
                    <span id="error-message" style="display: none;">{{ session('loginErorr') }}</span>
                @endif
                @if (session()->has('success'))
                    <span id="error-message" style="display: none;">{{ session('success') }}</span>
                @endif
                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <label for="chk" aria-hidden="true">Login</label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        required
                        autocomplete="off"
                    />
                    @error('username')
                        <span id="error-message" style="display: none;">{{ $message }}</span>
                    @enderror
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                        autocomplete="off"
                    />
                    @error('password')
                        <span id="error-message" style="display: none;">{{ $message }}</span>
                    @enderror
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var errorMessage = document.getElementById("error-message");
            if (errorMessage) {
                alert(errorMessage.textContent);
            }
        });
    </script>
</html>

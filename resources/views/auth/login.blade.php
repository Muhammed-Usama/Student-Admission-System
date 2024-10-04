<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/fclogo.png') }}" type="image/x-icon">
</head>

<body>
    <div class="main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST" action="{{ route('register') }}"> <!-- Ensure this route exists -->
                @csrf
                <label for="chk" aria-hidden="true">sign up</label>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirm Password"
                    required>

                <div id="password-error" class="alert alert-danger" style="display: none;"></div>

                <button type="submit" id="signup-button">Sign Up</button>
            </form>
        </div>

        <div class="login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorDiv = document.getElementById('password-error');
            const signupButton = document.getElementById('signup-button');

            if (password !== confirmPassword) {
                errorDiv.textContent = "Passwords do not match.";
                errorDiv.style.display = "block";
                signupButton.disabled = true; // Disable button
                return false; // Prevent form submission
            } else {
                errorDiv.style.display = "none";
                signupButton.disabled = false; // Enable button
                return true; // Allow form submission
            }
        }

        // Optional: Live feedback on password match
        document.getElementById('confirm_password').addEventListener('input', validatePasswords);
    </script>
</body>

</html>

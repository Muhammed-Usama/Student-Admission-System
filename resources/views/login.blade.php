<!DOCTYPE html>
<html>

<head>
    <title>Student Admission System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/fclogo.png') }}" type="image/x-icon">
</head>

<body>
    @if (session('error_message'))
        <div class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="Name" required="">
                <input type="text" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">

                <button type="submit">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
</body>

</html>

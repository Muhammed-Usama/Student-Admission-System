<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admission Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('new/css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr./npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('new/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('new/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new/css/form.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    {{-- <link href="{{ asset('new/css/style.css') }}" rel="stylesheet"> --}}


</head>

@include('layouts.header')

<body class="hold-transition sidebar-mini">
    <div class="formbold-main-wrapper">

        <div class="formbold-form-wrapper">
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

            <!-- Content Wrapper. Contains page content -->
            @yield('contant')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('new/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('new/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('new/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('new/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('new/js/main.js') }}"></script>
    <script src="{{ asset('new/js/index.js') }}"></script>


</body>


</html>

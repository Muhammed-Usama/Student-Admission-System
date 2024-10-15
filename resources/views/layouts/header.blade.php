<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('faculities') }}" class="nav-item nav-link">Faculties</a>

            <!-- Conditional for Admission/Profile Link -->
            @auth
                @if (Auth::user()->already_registered == 'yes')
                    <a href="{{ route('profile') }}" class="nav-item nav-link">Profile</a>
                @else
                    <a href="{{ route('student') }}" class="nav-item nav-link">Admission</a>
                @endif
            @else
                <a href="{{ route('student') }}" class="nav-item nav-link">Admission</a>
            @endauth
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>

        <!-- Guest Links -->
        @guest
            @if (Route::has('login'))
                <a class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" href="{{ route('login') }}">
                    {{ __('Login') }} <i class="fa fa-arrow-right ms-3"></i>
                </a>
            @endif
        @else
            <!-- Authenticated User Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        @endguest
    </div>
</nav>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                @csrf
            </form>
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>


</nav>

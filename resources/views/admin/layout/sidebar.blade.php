<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- Users --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $usersCount }}</span>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admins</p>
                                <span class="badge badge-info right">{{ $adminsCount }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admins.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @php
                    $isAdmin = Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'adminstrator';
                @endphp
                {{-- IPS --}}
                @if ($isAdmin)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>
                                Admins IPS

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('ip.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admins IPS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ip.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Admin IP</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Student --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user-graduate"></i>
                        <p>
                            Students
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">{{ $studentsCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('finaldesire') }}" class="nav-link">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <p>Generate Desire</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sendmail') }}" class="nav-link">
                                <i class="fa-solid fa-envelope"></i>
                                <p>Send Emails</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.search') }}" class="nav-link">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <p>Search studnet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Faculty --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>
                            Faculties
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-info right">{{ $facultiesCount }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('faculty.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Faculty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faculty.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All Faculties</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

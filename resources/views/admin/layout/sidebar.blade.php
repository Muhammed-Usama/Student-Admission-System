<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i> <button
                    style="background-color: transparent;border: none;font-size: 15px;
  font-weight: 600;"><span
                        style="color: #012970;">Users</span></button>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admins.show') }}">
                        <i class="bi bi-circle"></i><span>Admins</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.show') }}">
                        <i class="bi bi-circle"></i><span>Normal Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admins.create') }}">
                        <i class="bi bi-circle"></i><span>Add Admin</span>
                    </a>
                </li>

            </ul>

        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><button
                    style="background-color: transparent;border: none;font-size: 15px;
  font-weight: 600;"><span
                        style="color: #012970;">Admins IPs</span></button>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('ip.index') }}">
                        <i class="bi bi-circle"></i><span>Admins IPs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ip.create') }}">
                        <i class="bi bi-circle"></i><span>Add Admin IP</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->
        {{-- Faculity --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Faculities</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('faculty.create') }}">
                        <i class="bi bi-circle"></i><span>Add Faculty</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('faculty.index') }}">
                        <i class="bi bi-circle"></i><span>Show All Faculities</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"
                        href="{{ route('finaldesire') }}">
                        <i class="bi bi-journal-text"></i><button
                            style="background-color: transparent;border: none;font-size: 15px;
          font-weight: 600;"><span
                                style="color: #012970;">Generate
                                Desire</span></button>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="{{ route('sendmail') }}">
                        <i class="bi bi-menu-button-wide"></i> <button
                            style="background-color: transparent;border: none;font-size: 15px;
              font-weight: 600;"><span
                                style="color: #012970;">Send
                                Emails</span></button> <i class="bi bi-chevron-down ms-auto"></i>
                    </a>

                <li>
                    <a href="{{ route('student.search') }}">
                        <i class="bi bi-circle"></i><span>Search studnet</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Charts Nav -->

    </ul>

</aside><!-- End Sidebar-->

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('img/logo.png') }}" alt="">
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">


              <li class="nav-item dropdown pe-3">

                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                      data-bs-toggle="dropdown">
                      <img src="{{ asset('new/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                      <span class="d-none d-md-block dropdown-toggle ps-2">Y. Awad</span>
                  </a><!-- End Profile Iamge Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      <li class="dropdown-header">
                          <h6>Youssef Awad</h6>
                          <span>Administrator</span>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      {{-- <li>
                          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                              <i class="bi bi-person"></i>
                              <span>My Profile</span>
                          </a>
                      </li> --}}
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      {{-- <li>
                          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                              <i class="bi bi-gear"></i>
                              <span>Account Settings</span>
                          </a>
                      </li> --}}
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                              @csrf
                          </form>
                          <a href="#" class="dropdown-item d-flex align-items-center"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="bi bi-box-arrow-right"></i>
                              Sign Out
                          </a>
                      </li>

                  </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

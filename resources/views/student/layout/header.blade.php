  <nav class=" navbar navbar-dark navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Student Admission</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item d-none d-sm-inline-block">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              <a href="#" class="nav-link"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
          </li>
      </ul>

  </nav>

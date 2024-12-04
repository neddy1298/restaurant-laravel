<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <!-- Brand -->
    <a
      class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
      href="{{ route('home') }}"
      >Dashboard</a
    >
    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a
          class="nav-link pr-0"
          href="#"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img
                src="{{
                  asset('assets')
                }}/img/user/{{ Auth::user()->gambar_user }}"
                class="img-fluid"
              />
            </span>
            <div class="media-body ml-2 d-none d-lg-block">
              <span
                class="mb-0 text-sm  font-weight-bold"
                >{{ Auth::user()->name }}</span
              >
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <a href="/user/{{ Auth::user()->id }}" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
          </a>
          <a href="{{ route('home') }}" class="dropdown-item">
            <i class="ni ni-calendar-grid-58"></i>
            <span>Activity</span>
          </a>
          <div class="dropdown-divider"></div>
          <a
            class="dropdown-item"
            href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
          >
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
          </a>

          <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            style="display: none;"
          >
            {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>

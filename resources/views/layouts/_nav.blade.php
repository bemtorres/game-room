<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle" id="pushmenu">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <a href="{{ route('cuenta') }}" class="border rounded-2 p-1 d-flex align-middle align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="btn-label"><img src="{{ asset('RoomGame.svg') }}" width="30" height="30" class="ms-2" /></span>
      <span class="fs-4 ms-2"><strong>{{ current_user()->getCredit() }}</strong></span>
    </a>
  </div>
</nav>

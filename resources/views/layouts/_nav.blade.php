<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>
  {{-- <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <div class="align-middle">
        <i class="fab fa-gg-circle fa-2x text-warning"></i>
        <strong class="align-middle">{{ current_user()->credit }}</strong>
      </h4>
    </ul>
  </div> --}}
  <div class="collapse navbar-collapse" id="navbarCollapse">
    {{-- <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul> --}}
    <a href="{{ route('cuenta') }}" class="btn btn-outline-dark d-flex align-middle align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="btn-label"><i class="fab fa-gg-circle text-warning fa-2x"></i></span>
      <span class="fs-4 ms-2"><strong>{{ current_user()->getCredit() }}</strong></span>
    </a>
  </div>
</nav>
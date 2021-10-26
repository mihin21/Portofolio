<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="">
          <h3 class="text-white">Mon Portofolio</h3>
        </a>
      <a class="sidebar-brand brand-logo-mini" href="">
          <h3 class="text-white">M</h3>
        </a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('front/img/about.png') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">HUGUES AIME</h5>
              <span>Administrateur</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Changer de mot de passe</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ asset('admin/index') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link"  href="{{ asset('admin/home_settings')}}" >
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Paramètre Acceuil</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#authi" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Paramètre A propos</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="authi">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/about_settings') }}"> Description et Photo </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/skill_settings') }}"> Skills </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/cv_settings') }}"> Cv </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ asset('admin/formation_settings') }}"> Formations </a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ asset('admin/portfolio_settings') }}">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Paramètre Realisation</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ asset('admin/contact_settings') }}">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Paramètre Contact</span>
        </a>
      </li>
    </ul>
  </nav>

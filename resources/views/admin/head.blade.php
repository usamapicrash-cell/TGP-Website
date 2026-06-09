 <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
    
    




<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu" >
  
  <div class="app-brand demo ">
      <span class="app-brand-text demo menu-text fw-semibold ms-0">THE GLASS PEOPLE</span>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item">
        <a href="{{ url('/admin') }}" class="menu-link small">
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
       </li>

      <!-- Apps & Pages -->
      <li class="menu-header small mt-5">
        <span class="menu-header-text" data-i18n="Apps & Pages">Pages</span>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/home-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-home-line"></i>
          <div data-i18n="Home">Home Page</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/about-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-file-text-line"></i>
          <div data-i18n="About">About Page</div>
        </a>
      </li>

    
    <li class="menu-item">
        <a href="{{ url('/admin/service-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-building-line"></i>
          <div data-i18n="Services">Services Page</div>
        </a>
      </li>


      <li class="menu-item">
        <a href="{{ url('/admin/review-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-star-line"></i>
          <div data-i18n="Review">Review Page</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/blog-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-file-text-line"></i>
          <div data-i18n="Blog">Blog Page</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/gallery-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-gallery-line"></i>
          <div data-i18n="Gallery">Gallery Page</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/contact') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-contacts-line"></i>
          <div data-i18n="Contact">Contact Page</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/custom-pages') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-pages-fill"></i>
          <div data-i18n="Custom">Custom Pages</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/nav-foot-setting') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-pages-fill"></i>
          <div data-i18n="Custom">Nav and Foot Setting</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/privacy-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-police-badge-line"></i>
          <div data-i18n="Privacy">Privacy Policy</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ url('/admin/terms-edit') }}" class="menu-link">
          <i class="menu-icon icon-base ri ri-terminal-line"></i>
          <div data-i18n="Terms">Terms of Service</div>
        </a>
      </li>

      
    </ul>
    
  
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
    <i class="ri ri-menu-line icon-base"></i>
    <i class="ri ri-arrow-right-s-line icon-base"></i>
  </a>
</div>
<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
      
      



<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  




  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
      <i class="icon-base ri ri-menu-line icon-22px"></i>
    </a>
  </div>


<div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
  
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper mb-0">
        <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
          <span class="d-inline-block text-body-secondary fw-normal" id="autocomplete"></span>
        </a>
      </div>
    </div>

    <!-- /Search -->
  
  

  

  <ul class="navbar-nav flex-row align-items-center ms-md-auto">
    
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <div class="avatar-initial rounded-circle bg-label-primary text-uppercase">
              {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </div>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
          <li>
            <a class="dropdown-item" href="https://demos.pixinvent.com/materialize-html-admin-template/html/vertical-menu-template-bordered/pages-account-settings-account.html">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                  {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0 small text-uppercase">{{ Auth::user()->name ?? 'Admin' }}</h6>
                  <small class="text-body-secondary">{{ Auth::user()->email ?? 'Administrator' }}</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ url('/admin/profile-edit') }}"> <i class="icon-base ri ri-user-3-line icon-22px me-3"></i><span class="align-middle">My Profile</span> </a>
          </li>
          
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <div class="d-grid px-4 pt-2 pb-1">
              <a class="btn btn-sm btn-danger d-flex" href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <small class="align-middle">Logout</small>
              <i class="icon-base ri ri-logout-box-r-line ms-2 icon-16px"></i>
            </a>
            
            {{-- Hidden Logout Form for Security --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
          </li>
        </ul>
      </li>
      <!--/ User -->
    
  </ul>
</div>

</nav>

<!-- / Navbar -->
      


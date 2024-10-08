<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="/"><h1 style="color: white">VIRGINIA</h1></a>
      <a class="sidebar-brand brand-logo-mini" href="/"><h1 style="color: white">V</h1></a>
    </div>
    
    <ul class="nav">
      @if (Auth::user()->role_id != 2)
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Students</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a  style="color: #6c757d" href="/dashboard/students/list">List</a></li>
            <li class="nav-item"> <a  style="color: #6c757d" href="/dashboard/approving">Approving</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Materials</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/materials/list">List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Class</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/group/list">List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Meeting</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/meeting/list">List</a></li>
          </ul>
        </div>
      </li>

      @else
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Materials</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/materials/list">List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">Class</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/group/list">List</a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item menu-items" style="margin-top:20px">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-account-multiple"></i>
          </span>
          <span class="menu-title">CV</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/cv/education">Education</a></li>
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/cv/experience">Experience</a></li>
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/cv/achievement">Achievement</a></li>
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/cv/skill">Skill</a></li>
            <li class="nav-item"> <a style="color: #6c757d" href="/dashboard/cv/input">Input Data</a></li>
          </ul>
        </div>
        
      </li>
      @endif
      
      
      
       
      
      
      
      {{-- <li class="nav-item menu-items">
        <a class="nav-link" href="/dashboard/materials">
          <span class="menu-icon">
            <i class="mdi mdi-book-open-page-variant"></i>
          </span>
          <span class="menu-title">Materials</span>
        </a>
      </li> --}}




      {{-- <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Form Elements</span>
        </a>
      </li> --}}
    </ul>
  </nav>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret bg-gradient-dark col-2" id="sidenav-main">
  <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-white" href="#">
          <span class="font-weight-bold">کیان کارشناس</span>
      </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse px-0 w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{route('home')}}">
                  <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons-round opacity-10">dashboard</i>
                  </div>
                  <span class="nav-link-text me-1">داشبورد</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() == 'admin.show' ? 'active' : '' }}" href="{{route('admin.show')}}">
                  <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons-round opacity-10">people</i>
                  </div>
                  <span class="nav-link-text me-1">مشتریان</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() == 'customer.form' ? 'active' : '' }}" href="{{route('customer.form')}}">
                  <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons-round opacity-10">event</i>
                  </div>
                  <span class="nav-link-text me-1">نوبت‌دهی</span>
              </a>
          </li>
      </ul>
  </div>
</aside>
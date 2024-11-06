<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark col-2" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="me-1 font-weight-bold text-white">Material Dashboard 2</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{route('home')}}">
          <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
            <i class="material-icons-round opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text me-1">داشبورد</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <button class="nav-link text-white" style="width: 87%;" data-bs-toggle="collapse" type="button" id="debts">
          <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
            <i class="material-icons-round opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text me-1">Boxes</span>
        </button>
        <div class="collapse w-auto" id="debtsShow">
          <ul class="navbar-nav">
            <a  class="nav-link text-white" href="{{route('boxes.show')}}"><li>Show</li></a>
            <a class="nav-link text-white" href="{{route('boxes.make')}}"><li>Create</li></a>
          </ul>
        </div> 
      </li> --}}
</aside>
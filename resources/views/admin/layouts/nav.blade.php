  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
      <li class="nav-item d-none d-sm-inline-block">
      <div class="btn-group">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      
                      {{ trans('main.Language')}}
                          </button>
                          <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="/lang/en">En</a>
                            <a class="dropdown-item" href="/lang/ar">Ar</a>
                          </div>
                        </div>
                      </div>
      </li>
    </ul>
@include('admin.layouts.menu') 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('/') }}/design/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ trans('main.title')}} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{  Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              {{ trans('main.dash')}} 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.users.index')}}" class="nav-link  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ trans('main.clients')}} </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.stuff.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ trans('main.stuff')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.news.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ trans('main.news')}}</p>
                </a>
              </li>
            </ul>
          </li> 
          <!--  -->
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

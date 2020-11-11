<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/Letter-M-icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FTW</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"z>
          <img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Students
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{route('students.index')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='students.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{route('students.create')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='students.create' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Instructors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                    <a href="{{route('instructors.index')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='instructors.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('instructors.create')}}" class="nav-link {{\Illuminate\Support\Facades\Route::currentRouteName()=='instructors.create' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="{{route('log_out')}}" id="logout"  class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
        <img src="{{asset('images/Letter-M-icon.png')}}" style=position:absolute;bottom:1%;left:20%>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" -->
           <!-- style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Inventory System</span>
    </a>

    <!-- Sidebar -->
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=""{{ asset('asset/dist/img/user2-160x160.jpg"') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
            {{-- Master data bigins --}}
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('buyer.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Suppliers</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Catogary Master</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Services</p>
                  </a>
                </li>
            </ul>
          </li>
          {{-- Master Data Ends here --}}

          {{-- Production begins --}}
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Production Master
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('productions') }} " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Production</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Production ends --}}
               
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
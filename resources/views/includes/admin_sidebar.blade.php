<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Account</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Manage Groups
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/admin/create_group" class="nav-link">
        <i class="fas fa-user-plus nav-icon"></i>
        <p>Create group</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/view_group" class="nav-link">
        <i class="fas fa-eye nav-icon"></i>
        <p>View Groups </p>
      </a>
    </li>
  </ul>
</li>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-phone-square"></i>
    <p>
      Manage Contacts
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/admin/upload_contact" class="nav-link">
        <i class="fas fa-user-plus nav-icon"></i>
        <p>Upload Contacts</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/add_contact" class="nav-link">
        <i class="fas fa-user-plus nav-icon"></i>
        <p>Add Contacts</p>
      </a>
    </li>
  
  </ul>
</li>


<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-sms"></i>
    <p>
      Manage Sms
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/admin/send_sms" class="nav-link">
        <i class="fas fa-sms nav-icon"></i>
        <p> Send Sms</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/view_sms" class="nav-link">
        <i class="fas fa-eye nav-icon"></i>
        <p>View sms</p>
      </a>
    </li>
  
  </ul>
</li>



</li>

 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
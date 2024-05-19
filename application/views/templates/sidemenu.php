<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #003b0a">
    <!-- Brand Logo -->
    <a href="<?php echo site_url() ?>" class="brand-link">
      <img src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Journal of Science</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php if($this->session->userdata('userid')) : ?>
              <a href="#" class="d-block"><?php echo $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname'); ?></a>
          <?php else : ?>
              <a href="#" class="d-block">Guest</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">Public View</li>
          <li class="nav-item">
            <a href="<?php echo base_url('generals') ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Public Home
              </p>
            </a>
          </li>

          <!-- <li class="nav-header">PAGES</li>
          <li class="nav-item">
            <a href="<?php echo base_url('home') ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('about') ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                About
              </p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?php echo base_url('services') ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Services
              </p>
            </a>
          </li> -->
          

          <li class="nav-header">MANAGEMENT</li>
          <li class="nav-item">
            <a href="<?php echo base_url('users') ?>" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('authors') ?>" class="nav-link">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <p>
                Authors
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('proofreaders') ?>" class="nav-link">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <p>
                Proofreaders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('articles') ?>" class="nav-link">
            <i class="fa fa-book" aria-hidden="true"></i>
              <p>
                Articles
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('volumes') ?>" class="nav-link">
            <i class="fa fa-book" aria-hidden="true"></i>
              <p>
                Volumes
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
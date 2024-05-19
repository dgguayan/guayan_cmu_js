<html lang="en" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMU Journal of Science</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="sidebar-collapse layout-top-nav" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background-color: #FFA800">
    <div class="container">
      <a href="<?php echo site_url('generals') ?>" class="navbar-brand">
        <img src="<?php echo base_url()?>assets/dist/img/js_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-heavy"><span class="text-bold">CMU</span> Journal of Science</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          
          <li class="nav-item">
            
              <a href="<?php echo base_url('generals'); ?>" class="nav-link text-bold"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
            
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('volumes_general'); ?>" class="nav-link text-bold"><i class="fa fa-book" aria-hidden="true"></i>Volumes</a>
          </li>
          
        </ul>

        <!-- SEARCH FORM -->
       

      <!-- Right navbar links -->
      <ul class="navbar-nav  ml-auto">
        <?php if(!$this->session->userdata('signedin')) : ?>
          <li class="nav-item">
            <a href="<?php echo base_url('signin') ?>" class="nav-link text-bold"><i class="fa fa-arrow-right" aria-hidden="true"></i>Sign In</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('signup') ?>" class="nav-link text-bold"><i class="fa fa-user-plus" aria-hidden="true"></i>Sign Up</a>
          </li>
        <?php endif; ?>

        <?php if($this->session->userdata('signedin')) : ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>generals/signout" class="nav-link text-bold"><i class="fa fa-user-times" aria-hidden="true"></i>Sign Out</a>
          </li>
        <?php endif; ?>

      </ul>

        
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #003b0a">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('generals') ?>" class="brand-link">
      <img src="<?php echo base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Journal of Science</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
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
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
      <?php if($this->session->userdata('signedin')) : ?>
          <li class="nav-header">ARTICLE TOOLS</li>
          <li class="nav-item">
            <a href="<?php echo base_url('add_article_general') ?>" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Submit Article
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('articles_general') ?>" class="nav-link">
              <i class="fa fa-address-book" aria-hidden="true"></i>
              <p>
                List of Submitted Article
              </p>
            </a>
          </li>
        <?php endif; ?>

        <?php if($this->session->userdata('roleid') == 2) :?>
        <li class="nav-header">PROOFREADER TOOLS</li>
          <li class="nav-item">
            <a href="<?php echo base_url('home') ?>" class="nav-link">
            <i class="fa fa-check-square" aria-hidden="true"></i>
              <p>
                Evaluate Articles
              </p>
            </a>
          </li>
          <?php endif; ?>

          
        <?php if($this->session->userdata('roleid') == 3) :?>
        <li class="nav-header">ADMIN TOOLS</li>
          <li class="nav-item">
            <a href="<?php echo base_url('home') ?>" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Go To Management
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <?php endif; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
    <!-- /.content-header -->

    <!-- Main content -->
    

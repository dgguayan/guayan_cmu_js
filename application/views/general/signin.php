<body class="login-page" style="min-height: 464px;">
<div class="login-box">

<!-- signin failed message -->
<?php if($this->session->flashdata('signedin_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('signedin_failed').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('user_signedout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_signedout').'</p>'; ?>
  <?php endif; ?>
  
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>CMU</b><br>Journal of Science</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php echo validation_errors(); ?>
      <?php echo form_open('generals/signin'); ?>
      
      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      
      <p class="mb-0">
        No Account?<a href="<?php echo site_url('generals/signup'); ?>" class="text-center"> Sign-up now!</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>


</body>
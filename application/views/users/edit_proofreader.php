<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="content">
        <div class="row mb-2 justify-content-center">
          <div class="col-sm-3">
            <h1>Edit Proofreader</h1>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Proofreader</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php echo validation_errors(); ?>

    <?php echo form_open('proofreaders/update_proofreader') ?>
    <input type="hidden" name="userid" value="<?php echo $users['userid']; ?>">
    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $users['firstname']; ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $users['lastname']; ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $users['email']; ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input type="password" id="pword" name="pword" class="form-control" value="<?php echo $users['pword']; ?>">
              </div>
              <div class="form-group">
                  <label for="status">Status</label>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="status" name="status" value="1" <?php echo $users['status'] == 1 ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="status">Active</label>
                  </div>
              </div>

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <a href="<?php echo base_url('proofreaders'); ?>" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Edit" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
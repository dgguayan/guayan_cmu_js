<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid text-center">
        <div class="row mb-2 justify-content-center">
          <div class="col-sm-6 text-center">
            <h1>Edit Role</h1>
          </div>
          <div class="col-sm-5 text-center">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php echo validation_errors(); ?>

    <?php echo form_open('roles/update_role') ?>
    <input type="hidden" name="roleid" value="<?php echo $roles['roleid']; ?>">
<!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Role</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Role Name</label>
                <input type="text" id="rolename" name="rolename" class="form-control" value="<?php echo $roles['rolename']; ?>">
              </div>
              
              <div class="form-group">
                <label for="inputName">Branch of what role?</label>
                <input type="text" id="rolebranch" name="rolebranch" class="form-control" value="<?php echo $roles['rolebranch']; ?>">
              </div>

              <div class="form-group">
                  <label for="status">Status</label>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="status" name="status" value="1" <?php echo $roles['status'] == 1 ? 'checked' : ''; ?>>
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
          <a href="<?php echo base_url('roles'); ?>" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Edit" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
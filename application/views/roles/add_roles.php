<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid text-center">
        <div class="row mb-2 justify-content-center">
          <div class="col-sm-6 text-center">
            <h1>Add Role</h1>
          </div>
          <div class="col-sm-5 text-center">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php echo validation_errors(); ?>

    <?php echo form_open('roles/add_roles') ?>
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
                <input type="text" id="firstname" name="rolename" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="inputName">Branch of what role?</label>
                <select class="form-control" name="rolebranch">
                          <option name="author" value="1">Author</option>
                          <option name="evaluator" value="2">Evaluator</option>
                          <option name="admin" value="3">Admin</option>
                        </select>
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
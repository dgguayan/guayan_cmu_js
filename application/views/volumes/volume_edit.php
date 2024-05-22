<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="content">
        <div class="row mb-2 justify-content-center">
          <div class="col-sm-3">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php echo validation_errors(); ?>

    <?php echo form_open('volumes/update_volume') ?>
    <input type="hidden" name="volumeid" value="<?php echo $volumes['volumeid']; ?>">
    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Volume</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Volume Name</label>
                <input type="text" id="vol_name" name="vol_name" class="form-control" value="<?php echo $volumes['vol_name']; ?>">
              </div>
    
              <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="ckeditor" class="form-control" name="description" style="height: 500px;"><?php echo $volumes['description']; ?></textarea>
              </div>

              <div class="form-group">
                  <label for="status">Status</label>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="status" name="status" value="1" <?php echo $volumes['status'] == 1 ? 'checked' : ''; ?>>
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
          <a href="<?php echo base_url('volumes'); ?>" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Edit" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<div class="content-wrapper" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-middle">
                  <h3 class="card-title col-sm-10">List of Roles in table</h3>
                  <a type="button" class="btn btn-primary col-sm-2" href="<?php echo base_url('add_roles') ?>">Add Role</a>
                
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div></div>
                
                  
                      
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Role Name</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                    
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th></tr>
                    
                  </thead>
                  <tbody>
                  <?php foreach($roles as $role) : ?>
                    
                    <tr>
                    <td><?php echo $role['rolename']; ?></td>
                    <td>
                        <?php if ($role['status'] == 1) { ?>
                            <p class="text-success text-bold">Active</p>
                        <?php } else { ?>
                          <p class="text-danger text-bold">Disabled</p>
                        <?php } ?>
                    </td>

                    <td>
                    
                    <a href="<?php echo site_url("roles/edit_roles/".$role['roleid']); ?>"><box-icon name='edit-alt' type='solid' ></box-icon></a>
                    
                    &nbsp;
                    <!-- <//?php echo form_open('proofreaders/delete_proofreader/'.$role['roleid'], array('style' => 'display: inline-block;')); ?>
                        <button type="submit" value="Delete" style="border: none; background-color: transparent;">
                            <box-icon name='trash' type='solid'></box-icon>
                        </button> -->

                    </form>
                    </td>
                    </tr>
                    
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <!-- <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr> -->
                  </tfoot>
                    
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
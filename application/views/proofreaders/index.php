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
                  <h3 class="card-title col-sm-10">List of Evaluators in table</h3>
                  <a type="button" class="btn btn-primary col-sm-2" href="<?php echo base_url('add_user_evaluator') ?>">Add Evaluator</a>
                
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
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Lastname</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Firstname</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Account Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Created at</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th></tr>
                    
                  </thead>
                  <tbody>
                  <?php foreach($users as $user) : ?>
                    <?php if ($user['roleid'] == 2) { ?>
                    <tr>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    
                    <td>
                        <?php if ($user['status'] == 1) { ?>
                            <p class="text-success text-bold">Active</p>
                        <?php } else { ?>
                          <p class="text-danger text-bold">Disabled</p>
                        <?php } ?>
                    </td>


                    <td><?php echo $user['date_at']; ?></td>
                    <td>
                    
                    <a href="<?php echo site_url('user_detail/'.$user['userid']); ?>"><box-icon type='solid' name='user-detail'></box-icon></a>

                    &nbsp;
                    <a href="<?php echo site_url("proofreaders/edit_proofreader/".$user['userid']); ?>"><box-icon name='edit-alt' type='solid' ></box-icon></a>
                    
                    &nbsp;
                    <?php echo form_open('proofreaders/delete_proofreader/'.$user['userid'], array('style' => 'display: inline-block;')); ?>
                        <button type="submit" value="Delete" style="border: none; background-color: transparent;">
                            <box-icon name='trash' type='solid'></box-icon>
                        </button>

                    </form>
                    </td>
                    </tr>
                    <?php } else  ?>
                    
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
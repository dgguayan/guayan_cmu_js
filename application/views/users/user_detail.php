<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="row">
              <?php if( in_array($this->session->userdata('roleid'), [1, 2])) :?>
                <a href="<?php echo base_url('generals'); ?>" class="align-self-center" style="color: black !important;"><i class="fa fa-arrow-left align-self-center mr-3" aria-hidden="true"></i></a>
              <?php endif; ?>
              <?php if( $this->session->userdata('roleid') == 3) :?>
                <a href="<?php echo base_url('users'); ?>" class="align-self-center" style="color: black !important;"><i class="fa fa-arrow-left align-self-center mr-3" aria-hidden="true"></i></a>
              <?php endif; ?>
              <h1>User Profile</h1>
            </div>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <div class="col">
                    <img class="profile-user-img img-fluid img-circle col" src="<?php echo base_url('assets/upload/uploaded_images/'.$users['profile_pic']); ?>" alt="User profile picture">
                  </div>
                   </div>

                <h3 class="profile-username text-center"><?php echo $users['firstname'] . ' ' . $users['lastname']; ?></h3>

                <?php
                // Find the user's role name
                $user_role_name = '';
                foreach ($roles as $role) {
                    if ($role['roleid'] == $users['roleid']) {
                        $user_role_name = $role['rolename'];
                        break;
                    }
                }
                ?>

                <p class="text-muted text-center"><?php echo $user_role_name; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <!-- Post -->
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('users/update_detailview') ?>
                    <input type="hidden" name="userid" value="<?php echo $users['userid']; ?>">
                    <div class="form-group row">
                        <label for="inputImage" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input accept="image/jpeg,image/gif,image/png" type="file" name="profile_pic" id="inputImage">
                        </div>
                    </div>
                    <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Firstname</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" name="firstname" value="<?php echo $users['firstname']; ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Lastname</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" name="lastname" value="<?php echo $users['lastname']; ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName2" name="email" value="<?php echo $users['email']; ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Update</button>
                          </div>
                      </div>
                  </form>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

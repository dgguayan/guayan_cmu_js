<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   
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
    <div class="content">
      <div class="container">
      <div class="col-lg-12">
    <!-- <div class="col d-flex justify-content-center"> -->
   
        <div class="row">
        <?php foreach($volumes as $volume) : ?>
          <?php if ($volume['status'] == 1) : ?>
          <div class="col-lg-12">
          <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-book" aria-hidden="true"></i>
                &nbsp;
                  <?php echo $volume['vol_name']; ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <!-- IMAGE -->
                <div class="row">
                    <div class="col-md-2 align-self-center">
                        <img class="img-fluid pad" src="<?php echo base_url()?>assets/upload/uploaded_images/article_image.jpg" alt="Photo">
                    </div>
                    
                    <blockquote class="quote-success col-sm-9">
                        <h6 class="text-dark"><i class="fa fa-info-circle" aria-hidden="true"></i>Description</h6>
                        <div class="col">
                            <p class="text-justify"><?php echo word_limiter($volume['description'], 55); ?></p>
                        </div>
                    </blockquote>
                </div>
              <!-- /.card-body -->
              <a href="<?php echo site_url('volume_detail_general/'.$volume['volumeid']); ?>"><button type="button" class="mt-3 btn btn-block btn-dark col-md-2">Read More <i class="fa fa-arrow-right ml-1" style="color:white" aria-hidden="true"></i></button></a>
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <?php endif; ?>
        </div>
        
        <?php endforeach; ?>
        
          <!-- /.col-md-6 -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="row mb-2">
            
              <div class="col-sm-6">
                <div class="row">
                <?php if( $this->session->userdata('roleid') == 1) :?>
                  <a href="<?php echo base_url('articles_general'); ?>" class="align-self-center" style="color: black !important;"><i class="fa fa-arrow-left align-self-center mr-3" aria-hidden="true"></i></a>
                <?php endif; ?>

                <?php if( $this->session->userdata('roleid') == 3) :?>
                  <a href="<?php echo base_url('articles'); ?>" class="align-self-center" style="color: black !important;"><i class="fa fa-arrow-left align-self-center mr-3" aria-hidden="true"></i></a>
                <?php endif; ?>
                
                <h1><?= $title ?></h1>
                </div>
                
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>

                
              </div>
            </div>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-book" aria-hidden="true"></i>
                  &nbsp;
                  <?php echo $articles['title']; ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <!-- IMAGE -->
                <div class="row">
                    <div class="col-md-2 ml-5 align-self-center">
                        <img class="img-fluid pad align-middle" src="<?php echo base_url()?>assets/upload/uploaded_images/article_image.jpg" alt="Photo">
                    </div>
                    
                    <blockquote class="quote-success col-md-9">
                        <h6 class="text-dark">Abstract</h6>
                        <div class="col-md-11">
                            <p class="text-justify"><?php echo ($articles['abstract']); ?></p>
                        </div>
                    </blockquote>
                </div>
                  <?php
                    $author_names = array();
                          foreach ($authors as $author) {
                              if ($author['articleid'] == $articles['articleid']) {
                                  $author_names[] = $author['author_name'];
                              }
                          }
                  ?>

                  <p class="ml-5  mt-3"><i class="fa fa-users mr-1" aria-hidden="true"></i>Authors: <?php echo implode(', ', $author_names); ?></a></p>

                  <p class="ml-5"><i class="mr-1 fa fa-calendar" aria-hidden="true"></i>Date Published: <?php echo $articles['date_published']; ?></p>
               
                  <p class="ml-5"><i class="mr-1 fa fa-link" aria-hidden="true"></i>DOI: <a class="text-primary" href="<?php echo $articles['doi']; ?>"><?php echo $articles['doi']; ?></a></p>
                
                  <p class="ml-5"><i class="mr-1 fa fa-link" aria-hidden="true"></i>PDF: <a class="text-primary" href="<?php echo base_url()?>assets/uploads/articles/<?php echo $articles['filename'];?>" target="_blank">href="<?php echo base_url()?>assets/uploads/articles/<?php echo $articles['filename'];?>"</a></p>
                  
                  <?php  // if($this->session->userdata('userid') == $articles['userid'] || $this->session->userdata('roleid') == 3) :?>

                    <?php if ($this->article_model->is_author_of_article($this->session->userdata('userid'), $articles['articleid'])) : ?>
                        <a class="btn-block" href="<?php echo site_url("articles/edit_article_general/".$articles['articleid']); ?>"><button type="button" class="btn btn-block btn-primary">Edit</button></a>
                        
                        <?php echo form_open('articles/delete_article_user/'.$articles['articleid'], array('style' => 'display: block;')); ?>
                            <button type="submit" class="mt-2 btn btn-block btn-danger">Delete</button>
                        <?php echo form_close(); ?>
                    <?php endif; ?>

                    <!-- <?php if($this->session->userdata('userid') == $articles['userid']) :?>
                        <a class="btn-block" href="<?php echo site_url("articles/edit_article_general/".$articles['articleid']); ?>"><button type="button" class="btn btn-block btn-primary">Edit</button></a>
                        
                        <?php echo form_open('articles/delete_article_user/'.$articles['articleid'], array('style' => 'display: block;')); ?>
                            <button type="submit" class="mt-2 btn btn-block btn-danger">Delete</button>
                        <?php echo form_close(); ?>
                    <?php endif; ?> -->

                    <?php if( $this->session->userdata('roleid') == 3) :?>
                        <a class="btn-block" href="<?php echo site_url("articles/edit_article/".$articles['articleid']); ?>"><button type="button" class="btn btn-block btn-primary">Edit</button></a>
                        
                        <?php echo form_open('articles/delete_article_admin/'.$articles['articleid'], array('style' => 'display: block;')); ?>
                            <button type="submit" class="mt-2 btn btn-block btn-danger">Delete</button>
                        <?php echo form_close(); ?>

                    <?php endif; ?>

                 
                  </div>

              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>



                  <!-- /.tab-pane -->
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
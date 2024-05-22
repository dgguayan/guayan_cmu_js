<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-9">
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
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php foreach($articles as $article) : ?>
    
    <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-book" aria-hidden="true"></i>
                  &nbsp;
                  <?php echo $article['title']; ?>
                </h3>
              </div>
              <!-- /.card-header -->
              
                          
              <?php if ($article['published'] == 1) { ?>
                <div class="ribbon-wrapper ribbon-xl">
                  <div class="ribbon bg-success text-lg">
                    Published
                  </div>
                </div>
              <?php } else { ?>
                <div class="ribbon-wrapper ribbon-xl">
                  <div class="ribbon bg-warning text-lg">
                    Pending
                  </div>
                </div>
              <?php } ?>
                        
                        
                      
              <div class="card-body">

                <!-- IMAGE -->
                <div class="row">
                    <div class="col-md-2 ml-5">
                        <img class="img-fluid pad" src="<?php echo base_url()?>assets/upload/uploaded_images/article_image.jpg" alt="Photo">
                    </div>
                    
                    <blockquote class="quote-success col-md-9">
                        <h6 class="text-dark">Abstract</h6>
                        <div class="col-md-11">
                            <p class="text-justify"><?php echo word_limiter($article['abstract'], 90); ?></p>
                        </div>
                    </blockquote>
                </div>

                <?php     
                $author_names = array();
                foreach ($authors as $author) {
                    if ($author['articleid'] == $article['articleid']) {
                        $author_names[] = $author['author_lastname'] . ' ' . $author['author_firstname'];
                    }
                }
                ?>

                  <p class="ml-5"><i class="mr-1 mt-3 fa fa-users mr-1" aria-hidden="true"></i>Authors: <?php echo implode(', ', $author_names); ?></a></p>

                  <p class="ml-5"><i class="mr-1 fa fa-calendar" aria-hidden="true"></i>Date Published: <?php echo $article['date_published']; ?></p>
               
                  <p class="ml-5"><i class="mr-1 fa fa-link" aria-hidden="true"></i>DOI: <a class="text-primary" href="<?php echo $article['doi']; ?>"><?php echo $article['doi']; ?></a></p>
                
                  <?php if (isset($_POST['view_current_pdf'])) {
                    header('content-type: application/pdf');
                    readfile('assets/uploads/articles/Guayan, Lamutay, Pascual, Sarausa - Pricing Document.pdf');
                  }
                  ?>

                  <a class="text-primary" href="<?php echo base_url('assets/upload/articles/' . $article['filename']); ?>" target="_blank">
                    <button type="button" class="btn btn-block btn-success col-md-2 mb-2 ml-5"><i class="mr-1 fa fa-file" aria-hidden="true"></i>Open PDF</button>
                  </a>

                  <a href="<?php echo site_url('article_detail_general/'.$article['articleid']); ?>"><button type="button" class="btn btn-block btn-dark col-md-2 ml-5">Read More <i class="fa fa-arrow-right ml-1" style="color:white" aria-hidden="true"></i></button></a>

              </div>

              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>


        <?php endforeach; ?>


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
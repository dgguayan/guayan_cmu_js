<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="col-lg-12">
    <!-- <div class="col d-flex justify-content-center"> -->
            
    <!-- carousel -->
    
                <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="https://www.cmu.edu.ph/wp-content/uploads/2020/06/Transparency-Seal.jpg" alt="First slide">
                    </div>
                    <!-- <div class="carousel-item active">
                      <img class="d-block w-100" src="https://the-post-assets.sgp1.digitaloceanspaces.com/2020/10/CENTRAL-MINDANAO-UNIVERSITY-1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="https://i0.wp.com/metrocdodev.com/wp-content/uploads/2023/11/image-9.png?resize=960%2C720&ssl=1" alt="Third slide">
                    </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                
              <!-- /.card-body -->
            
            <!-- /.card -->
          </div>

          <!-- carousel -->

        
        <div class="row">
        <?php foreach($articles as $article) : ?>
          <?php if ($article['published'] == 1) : ?>
          <div class="col-lg-12">
          <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-book" aria-hidden="true"></i>
                &nbsp;
                  <?php echo $article['title']; ?>
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
                        <h6 class="text-dark">Abstract</h6>
                        <div class="col">
                            <p class="text-justify"><?php echo word_limiter($article['abstract'], 55); ?></p>
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
              
                <p class=""><i class="mr-1 mt-3 fa fa-users mr-1" aria-hidden="true"></i>Authors: <?php echo implode(', ', $author_names); ?></a></p>

                <p class=""><i class="mr-1 fa fa-calendar" aria-hidden="true"></i>Date Published: <?php echo $article['date_published']; ?></p>
               
                <p class=""><i class="mr-1 fa fa-link" aria-hidden="true"></i>DOI: <a class="text-primary" href="<?php echo $article['doi']; ?>"><?php echo $article['doi']; ?></a></p>
                
                <?php if (isset($_POST['view_current_pdf'])) {
                    header('content-type: application/pdf');
                    readfile('assets/uploads/articles/Guayan, Lamutay, Pascual, Sarausa - Pricing Document.pdf');
                  }
                  ?>

                  <a class="text-primary" href="<?php echo base_url('assets/upload/articles/' . $article['filename']); ?>" target="_blank">
                    <button type="button" class="btn btn-block btn-success col-md-2 mb-2"><i class="mr-1 fa fa-file" aria-hidden="true"></i>Open PDF</button>
                  </a>

                  <!-- <p class="">
                      <i class="mr-1 fa fa-file" aria-hidden="true"></i>PDF: 
                      <a class="text-primary" href="</?php echo base_url('assets/upload/articles/' . $article['filename']); ?>" target="_blank">
                          </?php echo $article['filename']; ?>
                      </a>
                  </p> -->

                <a href="<?php echo site_url('article_detail_general/'.$article['articleid']); ?>"><button type="button" class="btn btn-block btn-dark col-md-2">Read More <i class="fa fa-arrow-right ml-1" style="color:white" aria-hidden="true"></i></button></a>
              
                <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        
        <!-- <div class="col-lg-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div> -->
          <?php endif; ?>
        <?php endforeach; ?>
        
          <!-- /.col-md-6 -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

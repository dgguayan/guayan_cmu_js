<div class="row justify-content-center">
          <div class="col-md-11">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-book" aria-hidden="true"></i>
                  &nbsp;
                  <?php echo $article['title']; ?>
                </h3>
              </div>
              <!-- /.card-header -->
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
                        $author_names[] = $author['author_name'];
                    }
                }
                ?>

                  <p class="ml-5"><i class="mr-1 mt-3 fa fa-users mr-1" aria-hidden="true"></i>Authors: <?php echo implode(', ', $author_names); ?></a></p>

                  <p class="ml-5"><i class="mr-1 fa fa-calendar" aria-hidden="true"></i>Date Published: <?php echo $article['date_published']; ?></p>
               
                  <p class="ml-5"><i class="mr-1 fa fa-link" aria-hidden="true"></i>DOI: <a class="text-primary" href="<?php echo $article['doi']; ?>"><?php echo $article['doi']; ?></a></p>

                  <p class="ml-5"><i class="mr-1  fa fa-file" aria-hidden="true"></i>PDF: <a class="text-primary" href="<?php echo base_url()?>assets/uploads/articles/<?php echo $article['filename'];?>" target="_blank">href="<?php echo base_url()?>assets/uploads/articles/<?php echo $article['filename'];?>"</a></p>
                
                  <a href="<?php echo site_url('article_detail/'.$article['articleid']); ?>"><button type="button" class="btn btn-block btn-dark col-md-2 ml-5">Read More <i class="fa fa-arrow-right ml-1" style="color:white" aria-hidden="true"></i></button></a>

              </div>

              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
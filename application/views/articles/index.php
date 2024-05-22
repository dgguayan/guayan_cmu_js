<div class="content-wrapper" style="min-height: 1604.8px;">
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
              <li class="breadcrumb-item active">User Profile</li>
              
            </ol>

            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <h3 class="card-title col-sm-10"><?= $title ?></h3>
                  <a href="<?php echo base_url('add_article') ?>" class="btn btn-block btn-primary col-sm-2">Add Article</a>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div>
                
                <!-- <div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info"> -->
                  
              </div>
              <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    

                <thead>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Abstract</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Volume</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th>
                  </tr>
                </thead>
                
                  <tbody>
                  <?php foreach($articles as $article): ?>
                    
                    <tr>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo word_limiter($article['abstract'], 15); ?></td>
                    <td><?php echo $article['volumeid']; ?></td>
                    
                    <td>
                        <?php if ($article['published'] == 1) { ?>
                            <p class="text-success text-bold">Approved</p>
                        <?php } else { ?>
                          <p class="text-danger text-bold">Pending</p>
                        <?php } ?>
                    </td>

                    <td>
                    
                    <a href="<?php echo site_url('article_detail_evaluate/'.$article['articleid']); ?>"><box-icon type='solid' name='book-content'></box-icon></a>

                    &nbsp;
                    <!-- <a href="<?php echo site_url("articles/edit_article/".$article['articleid']); ?>"><box-icon name='edit-alt' type='solid' ></box-icon></a> -->
                    
                    &nbsp;
                    
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

                <?php foreach($articles as $article) : ?>


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
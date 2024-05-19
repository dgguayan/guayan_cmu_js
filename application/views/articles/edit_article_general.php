<div class="content-wrapper pb-5" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6">
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


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('articles/update_article_general')?>
    <input type="hidden" name="articleid" value="<?php echo $articles['articleid']; ?>">
    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Enter Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo $articles['title']; ?>">
              </div>
              <!-- <div class="form-group">
                <label for="inputDescription">Abstract</label>
                <textarea id="ckeditor" class="form-control" name="abstract" style="height: 500px;" value="<?php echo $articles['abstract']; ?>"></textarea>
              </div>
              <div class="form-group">
              
                <label for="inputStatus">Volume</label>
                
                <select id="volumeid" name="volumeid" class="form-control custom-select" value="<?php echo $articles['volumeid']; ?>">
                
                  <option selected="" disabled="">Select volume</option>
                  <?php foreach ($volumes as $volume) : ?>
                  <option  value="<?php echo $articles['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                  <?php endforeach; ?>
                
                </select>
                
              </div> -->
                <div class="form-group">
                    <label for="inputDescription">Abstract</label>
                    <textarea id="ckeditor" class="form-control" name="abstract" style="height: 500px;"><?php echo $articles['abstract']; ?></textarea>
                </div>

                <div class="form-group">
                
                <label for="inputStatus">Volume</label>
                
                <select id="volumeid" name="volumeid" class="form-control custom-select">
                
                    <option selected="" disabled="" value="<?php echo $articles['volumeid'];?>">Volume <?php echo $articles['volumeid'];?></option>
                    <?php foreach ($volumes as $volume) : ?>
                    <option  value="<?php echo $volume['volumeid'];?>"><?php echo $volume['vol_name']; ?></option>
                    <?php endforeach; ?>
                
                </select>
                
                </div>
                
              <div class="form-group">
                <label for="inputClientCompany">DOI</label>
                <input value="<?php echo $articles['doi']; ?>" type="text" name="doi" id="doi" class="form-control">
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <a href="<?php echo base_url('article_detail_general/'.$articles['articleid']); ?>" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Update Project" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
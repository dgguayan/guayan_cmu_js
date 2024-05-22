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
    <?php echo form_open_multipart('generals/add_article_general')?>

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
                <input type="text" id="title" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Abstract</label>
                <textarea id="ckeditor" class="form-control" name="abstract" style="height: 500px;"></textarea>
              </div>

              <div class="form-group">
                <label>Authors</label>
                <div class="select2-success">
                  <select name="authors[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select authors" data-dropdown-css-class="select2-success" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                    
                  <?php foreach($authors as $author) :?>
                    <option  value="<?php echo $author['auid'];?>"><?php echo $author['author_lastname'] . ' ' . $author['author_firstname']; ?></option>
                  <?php endforeach; ?>

            
                  </select>
                </div>
              </div>

              <div class="form-group">
              
                <label for="inputStatus">Volume</label>
                
                <select id="volumeid" name="volumeid" class="form-control custom-select">
                
                  <option selected="" disabled="">Select volume</option>
                  <?php foreach ($volumes as $volume) : ?>
                  <option  value="<?php echo $volume['volumeid'];?>"><?php echo $volume['vol_name']; ?></option>
                  <?php endforeach; ?>
                
                </select>
                
              </div>
              <div class="form-group">
                <label for="inputClientCompany">DOI</label>
                <input placeholder="Enter DOI" type="text" name="doi" id="doi" class="form-control">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Upload File</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input accept="application/pdf" type="file" name="filename">
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
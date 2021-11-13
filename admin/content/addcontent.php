<?php

session_start();
require "../../lib/helper.php";

if(empty($_SESSION['user'])){
  helper::redirect("../login");
}
  require "../../lib/db.php";
  require "../../lib/category.php";
  require "../../lib/content.php";
  require "../../lib/validation.php";

  $category = new category();
  $categorydata= $category->getCategoryList();

  $success='';
  $error='';
 

  

 include "../header.php";
 ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
            <?php if(!empty($success)):?>
              <div class="alert alert-success" role="alert">
                  <?= $success?>
              </div>
            <?php endif;?>

            <?php if(strlen($error)>0):?>
              <div class="alert alert-danger" role="alert">
                  <?= $error?>
              </div>
            <?php endif;?>

            <form action="addcategory.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter shortDesc">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                   <textarea id="summernote" name="desc">

                   </textarea>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Cover</label>
                    <input type="file" name="img" class="form-control" id="exampleInputEmail1" placeholder="Enter shortDesc">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Caregory</label>
                    <select name="category">
                        <?php foreach($categorydata as $category):?>
                           <option value="<?= $category['id'];?>"> <?= $category['name'];?></option>
                        <?php endforeach;?>

                    </select>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  
<?php include "../footer.php" ;?>

        
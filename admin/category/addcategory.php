<?php

session_start();
require "../../lib/helper.php";

if(empty($_SESSION['user'])){
  helper::redirect("../login");
}

  require "../../lib/db.php";
  require "../../lib/category.php";
  require "../../lib/validation.php";

  $success='';
  $error='';
  if(isset($_POST['category'])){
    $validation_res= Validation::string_Empty($_POST['category']);

    if($validation_res== false){
        $category=new category;
        $res=$category->addNewCategory( 
            [ "name" => $_POST['category'] ]
          );

        if(!empty($res)){
           $success="Category inserted";
           helper::redirect(2,"listofcategory");
        }else{
           Echo "Category not found ";
        }

    }else{
       $error="Category input must be required";
    }
       
  }

  

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

            <form action="addcategory.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name">
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

        
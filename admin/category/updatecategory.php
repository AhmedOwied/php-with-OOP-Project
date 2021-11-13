<?php
session_start();

require "../../lib/helper.php";

if(empty($_SESSION['user'])){
  helper::redirect("../login");
}
require "../../lib/db.php";
require "../../lib/category.php";
require "../../lib/validation.php";

//update caegory
$category =new category();
$category_data=$category->getcategorybyid($_GET['id']);


if(isset($_POST['category'])){
    $category->updatecategory($_POST['id'],
      [ "name"=>$_POST['category'] ]
    );
    helper::redirect("listofcategory");
}

?>

<?php include "../header.php"?>

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
            <form action="updatecategory.php" method="post">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" value="<?= $category_data['name']?>" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name">
                    </div>

                    <input type="hidden" value="<?= $_GET['id']?>" name="id" class="form-control" id="exampleInputEmail1">
                    
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
  
<?php include "../footer.php"?>

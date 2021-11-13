<?php
session_start();
require "../../lib/helper.php";

if(empty($_SESSION['user'])){
  helper::redirect("../login");
}
require "../../lib/db.php";
require "../../lib/category.php";

$category = new category();
$category_list= $category->getCategoryList();

?>



<?php include "../header.php"?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <a href="addcategory.php" class="btn btn-success"> add New Category</a>

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
        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>category name</th>
                      <th>update</th>
                      <th>delete</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($category_list as $category):?>
                    <tr>
                      <td><?= $category['id']?></td>
                      <td><?= $category['name']?></td>
                      <td><a href="updatecategory.php?id=<?= $category['id']?>">update</a></td>
                      <td><a href="deletecategory.php?id=<?= $category['id']?>">delete</a></td>
                      
                    </tr>
                    <?php endforeach;?>
                 
                  </tbody>
                </table>
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
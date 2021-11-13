<?php
require "../../lib/db.php";
require "../../lib/category.php";
require "../../lib/helper.php";


$category = new category();
$category->deletecategory($_GET['id']);
helper::redirect("listofcategory");

?>
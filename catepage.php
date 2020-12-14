<?php 
require_once('header.php');

?>

<?php
if(isset($_GET['id'])){
    $m=$_GET['id'];
    require_once('class/product.php');
    require_once('class/dbcon.php');
    $obj= new DB();
    $obj2=new Product();
   $back= $obj2->cat_dyn($m,$obj->conn);
  foreach($back as $val){
      echo $val['html'];
  }
}

?>


<?php 
require_once('footer.php');

?>
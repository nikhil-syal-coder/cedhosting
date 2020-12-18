<?php 
session_start();
if(isset($_GET['id'])){
    $m=$_GET['id'];
    echo $m;
    foreach ($_SESSION['cart'] as $key=>$val){
     unset($_SESSION['cart'][$m]);
    }
   header('location:cart.php'); 
}
?>
<?php 
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}
if(isset($_GET['id'])){
    $m=$_GET['id'];
    
    require_once('class/product.php');
    require_once('class/dbcon.php');
    $obj= new DB();
    $obj2=new Product();
    $back2=$obj2->cont_dyn($m,$obj->conn);
   if($_GET['action']=="mon"){
    foreach($back2 as $value){
    $abc=json_decode($value['description'], true);
    $cart=array('name'=>$value['prod_name'],
               'price'=>$value['mon_price'],
               'Package'=>"Monthly",
               'webspace'=>$abc['web_space'],
               'domain'=>$abc['free_domain'],
               'band_width'=>$abc['band_width'],
               'sku'=>$value['sku'],
               'id'=>$value['id'],
               'parent_id'=>$value['prod_parent_id']

);

     array_push($_SESSION['cart'],$cart);
     echo '<pre>';
     print_r($_SESSION['cart']);
     echo '</pre>';
    
      header('location:cart.php');
}
}
if($_GET['action']=="ann"){
    foreach($back2 as $value){
    $abc=json_decode($value['description'], true);
    $cart=array('name'=>$value['prod_name'],
               'price'=>$value['annual_price'],
               'Package'=>"Annually",
               'webspace'=>$abc['web_space'],
               'domain'=>$abc['free_domain'],
               'band_width'=>$abc['band_width'],
               'sku'=>$value['sku'],
               'id'=>$value['id'],
               'parent_id'=>$value['prod_parent_id']

);

     array_push($_SESSION['cart'],$cart);
     echo '<pre>';
     print_r($_SESSION['cart']);
     echo '</pre>';
    
      header('location:cart.php');
}
}
}




?>
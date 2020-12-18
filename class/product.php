<?php
if(!isset($_SESSION)){
    session_start();
}


require_once('dbcon.php');
class Product{
    public $id,$name,$link,$avb,$conn;

    function cat($id,$name,$link,$conn){
     
     $sql="INSERT INTO `tbl_product` (`prod_parent_id`, `prod_name`, `html`,`prod_available`, `prod_launch_date`)
      VALUES ('".$id."', '".$name."', '".$link."',1, now())";
     $result=$conn->query($sql);
     $last_id = $conn->insert_id;
     $_SESSION['id']=$last_id;
     echo "<script>alert('Category entered');</script>";
    }
    
    function cat_print($conn){
        $arry=array();
        $sql="SELECT * from tbl_product WHERE `prod_parent_id`='1'";
        $result=$conn->query($sql);
        // return $result;
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                array_push($arry,$row) ;
            }
            return $arry;
        }
    }
 function cat_del($m,$conn){
    $sql="DELETE FROM `tbl_product` WHERE `id`='".$m."'";
     $result=$conn->query($sql);
     echo "<script>alert('Category Deleted');</script>";
     header("location:category.php");
    }

function cat_edit($id,$parentid,$name,$avb,$conn){
    echo "<script>alert('Category updated');</script>";
    $sql="UPDATE `tbl_product`
     SET `prod_name`='".$name."',`prod_available`='".$avb."',`prod_parent_id`='".$parentid."'
     WHERE `id`='".$id."'";
   
 $result=$conn->query($sql);
}   



function cat_list($conn){
    $arry=array();
    $sql="SELECT * from tbl_product Where `prod_available`!='0' AND `prod_parent_id`='1'";
    $result=$conn->query($sql);
    // return $result;
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            array_push($arry,$row) ;
        }
        return $arry;
    }

}


function product_entry($name,$desp,$mprice,$aprice,$sku,$conn){

$sql="INSERT INTO tbl_product_description( `prod_id`, `description`, `mon_price`, `annual_price`, `sku`)
VALUES ('".$_SESSION['id']."','".$desp."','".$mprice."','".$aprice."','".$sku."')";

$result=$conn->query($sql);

}
function prod_list($conn){
    $arry=array();
 $sql="SELECT * FROM tbl_product
 INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id";
 $result=$conn->query($sql);
 // return $result;
 if ($result->num_rows > 0) {
     while ($row= $result->fetch_assoc()) {
         array_push($arry,$row) ;
     }
     return $arry;
 }
}
function prod_name($name,$conn){
    $sql="SELECT * from tbl_product Where `id`='".$name."'";
    $arry=array();
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            array_push($arry,$row) ;
        }
        return $arry;
}
}
function cat2($id,$drop,$parent,$name,$url,$avb,$conn){
$sql="UPDATE tbl_product SET `prod_name`='".$name."',`html`='".$url."',`prod_available`='".$avb."',`prod_parent_id`='".$drop."'
WHERE `id`='".$id."'";
$result=$conn->query($sql);
echo "<script>alert('product updated');</script>";
}

function product_entry2($id,$desp,$mprice,$aprice,$sku,$conn){
    $sql="UPDATE tbl_product_description SET `description`='".$desp."',`mon_price`='".$mprice."',`annual_price`='".$aprice."',`sku`='".$sku."'
    WHERE `prod_id`='".$id."'";
    $result=$conn->query($sql);  
}
function cat_del2($m,$conn){
    $sql="DELETE FROM `tbl_product` WHERE `id`='".$m."'";
     $result=$conn->query($sql);
     $sql1="DELETE FROM `tbl_product_description` WHERE `prod_id`='".$m."'";
     $result=$conn->query($sql1);
     echo "<script>alert('Category Deleted');</script>";
     header("location:productview.php");
    }


function cat_dyn($m,$conn){
    $sql="SELECT * FROM `tbl_product` Where `id`='".$m."'";
    $result=$conn->query($sql);
    $arry=array();
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            array_push($arry,$row) ;
        }
        return $arry;
}

}    
function cont_dyn($m,$conn){

$arry=array();
 $sql="SELECT * FROM tbl_product
INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id WHERE `prod_parent_id`='$m'";
$result=$conn->query($sql);
 if ($result->num_rows > 0) {
     while ($row= $result->fetch_assoc()) {
         array_push($arry,$row) ;
     }
     return $arry;
 }
}
function name($name,$conn){
    $sql="SELECT * from tbl_product Where `prod_name`='".$name."' AND `prod_parent_id`='1'";
    
    $result=$conn->query($sql);
   
    if ($result->num_rows > 0) {
        return 1;
        }
        else{
            return 0;
        }
    }





}
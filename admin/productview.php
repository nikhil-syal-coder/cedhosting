<?php 
require_once('header.php');
require_once('../class/product.php');
require_once('../class/dbcon.php');
$obj= new DB();
$obj2=new Product();
?>
<?php 
if(isset($_POST['submitt'])){
  $id=isset($_POST['id'])?$_POST['id']:'';
  $drop=isset($_POST['drop'])?$_POST['drop']:'';
  $parent=isset($_POST['parent-id'])?$_POST['parent-id']:'';
  $name=isset($_POST['name'])?$_POST['name']:'';
  $url=isset($_POST['url'])?$_POST['url']:'';
  $avb=isset($_POST['avb'])?$_POST['avb']:'';
  $mprice=isset($_POST['mprice'])?$_POST['mprice']:'';
  $aprice=isset($_POST['aprice'])?$_POST['aprice']:'';
  $sku=isset($_POST['sku'])?$_POST['sku']:'';
  $web_space=isset($_POST['web_space'])?$_POST['web_space']:'';
  $band=isset($_POST['band'])?$_POST['band']:'';
  $free=isset($_POST['free'])?$_POST['free']:'';
  $lang=isset($_POST['lang'])?$_POST['lang']:'';
  $mail=isset($_POST['mail'])?$_POST['mail']:'';
  $obj2->cat2($id,$drop,$parent,$name,$url,$avb,$obj->conn);
  $age = array("web_space"=>$web_space,
               "band_width"=>$band, 
               "free_domain"=>$free, 
               "mail"=>$mail, 
               "l/t_support"=>$lang);
              
   $desp= json_encode($age);
  
   $obj2->product_entry2($id,$desp,$mprice,$aprice,$sku,$obj->conn);
}



?>
<?php 
          
          require_once('../class/product.php');
          require_once('../class/dbcon.php');
          $obj= new DB();
          $obj2=new Product();
          $back=$obj2->cat_list($obj->conn);
         $a1=' <div id="cid_3" class="form-input-wide jf-required" data-layout="half"> <i class="fas fa-envelope prefix grey-text"></i>
         <select class="form-dropdown validate[required]" id="input_3" name="drop" style="width:310px" data-component="dropdown"  aria-labelledby="label_3"><option value=""> Please Select </option>';
          foreach($back as $val){
            $a1.=' <option value="'.$val['id'].'"> '.$val['prod_name'].'</option>';
          }
          $a1.='</select> <label data-error="wrong" data-success="right" for="defaultForm-email">Parent-Name</label> </div>';
      
          ?>
<?php
$back=$obj2->prod_list($obj->conn);
echo '<center><h3>View Product List</h3></center>';
$a='<div class="table-responsive"><table id="myTable"><thead><tr><th>Product-Parent-id</th><th>Product-Name</th><th>Product-Launch-Date</th><th>Monthly-Price</th><th>Yearly-Price</th><th>Sku</th><th>Web-Space</th><th>Band-Width</th><th>Free-Domain</th><th>Mail-box</th><th>L/T-Support</th><th>Action</th></tr></thead><tbody><tr>';
foreach($back as $val){
  $val3='';
    $name=$val['prod_parent_id'];
    $back2=$obj2->prod_name($name,$obj->conn);

    foreach((array)$back2 as $val2){
        $val3=$val2['prod_name'];
    }
    $fg="onClick=\"javascript: return confirm('Please confirm deletion')\"";
    $abc=json_decode($val['description'], true);
    $a.='<td>'.$val['prod_parent_id'].'</td>';
    $a.='<td>'.$val['prod_name'].'</td>';
   
    $a.='<td>'.$val['prod_launch_date'].'</td>';
    $a.='<td>'.$val['mon_price'].'</td>';
    $a.='<td>'.$val['annual_price'].'</td>';
    $a.='<td>'.$val['sku'].'</td>';
    $a.='<td>'.$abc['web_space'].'</td>';
    $a.='<td>'.$abc['band_width'].'</td>';
    $a.='<td>'.$abc['free_domain'].'</td>';
    $a.='<td>'.$abc['mail'].'</td>';
    $a.='<td>'.$abc['l/t_support'].'</td>';
    $a.='<td><a '.$fg.' href="cat_del.php?proddel='.$val['prod_id'].'" class="btn btn-default btn-rounded mb-4 sa">Delete</a><a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm'.$val['prod_id'].'">Edit</a></td></tr>';
    $b='
    <div class="modal fade" id="modalLoginForm'.$val['prod_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body mx-3">
      <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type ="hidden" value="'.$val['prod_id'].'" name="id" id="defaultForm-email" class="form-control validate id ml-4" readonly >
       
          <label data-error="wrong" data-success="right" for="defaultForm-email">Product-Id=='.$val['prod_id'].'</label>                                                                                                                                                                                                       
        </div>
        <div class="md-form mb-5">
        <i class="fas fa-envelope prefix grey-text"></i>
        <input type ="hidden" value="'.$val3.'" name="pname" id="defaultForm-email" class="form-control validate id ml-4" readonly >
     
        <label data-error="wrong" data-success="right" for="defaultForm-email">Parent-Name=='.$val3.'</label>                                                                                                                                                                                                                                                                                                                                                                                                  
      </div>
     
      '.$a1.'
     
       <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type ="hidden" value="'.$val['prod_parent_id'].'" name="parent-id" id="defaultForm-email" class="form-control validate id ml-4 >
       
          <label data-error="wrong" data-success="right" for="defaultForm-email">Product-Parent-Id=='.$val['prod_parent_id'].'</label>
        </div>
        <div class="md-form mb-5">
        <i class="fas fa-envelope prefix grey-text"></i>
        <input type ="text" value="'.$val['prod_name'].'" name="name" id="defaultForm-email" class="form-control validate id ml-4" >
     
        <label data-error="wrong" data-success="right" for="defaultForm-email">Product-Name</label>                                                                                                                                                                                                                                                                                                                                                                                                  
      </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$abc['web_space'].'" name="web_space"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Web-space</label>
        </div>
        <div class="md-form mb-4">
        <i class="fas fa-lock prefix grey-text"></i>
        <input type ="text" value="'.$abc['band_width'].'" name="band"  id="defaultForm-email" class="form-control validate id ml-4">
        <label data-error="wrong" data-success="right" for="defaultForm-pass">Band-width</label>
      </div>
      <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$abc['free_domain'].'" name="free"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Free-Domain</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$abc['mail'].'" name="mail"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Mail</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$abc['l/t_support'].'" name="lang"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">L/T Support</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type ="text" value="'.$val['mon_price'].'" name="mprice"  id="defaultForm-email" class="form-control validate id ml-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Monthly Price</label>
        </div>
        <div class="md-form mb-4">
        <i class="fas fa-lock prefix grey-text"></i>
        <input type ="text" value="'.$val['annual_price'].'" name="aprice"  id="defaultForm-email" class="form-control validate id ml-4">
        <label data-error="wrong" data-success="right" for="defaultForm-pass">Yearly-Price</label>
      </div>
      <div class="md-form mb-4">
      <i class="fas fa-lock prefix grey-text"></i>
      <input type ="text" value="'.$val['sku'].'" name="sku"  id="defaultForm-email" class="form-control validate id ml-4">
      <label data-error="wrong" data-success="right" for="defaultForm-pass">Sku</label>
    </div>
    <div class="md-form mb-4">
    <i class="fas fa-lock prefix grey-text"></i>
    <input type ="text" value="'.$val['html'].'" name="url"  id="defaultForm-email" class="form-control validate id ml-4">
    <label data-error="wrong" data-success="right" for="defaultForm-pass">Html</label>
  </div>
  <div class="md-form mb-4">
  <i class="fas fa-lock prefix grey-text"></i>
  <input type ="text" value="'.$val['prod_available'].'" name="avb"  id="defaultForm-email" class="form-control validate id ml-4">
  <label data-error="wrong" data-success="right" for="defaultForm-pass">Product-Available</label>
</div>
</div>
      <div class="modal-footer d-flex justify-content-center">
      <input type ="Submit" name="submitt" class="btn btn-default">
      </div>
      </form>
    </div>
  </div>
</div>';
    echo $b;
}
$a.='</tbody></table></div>';
echo $a;
?>
<?php 

require_once('footer.php')
?>
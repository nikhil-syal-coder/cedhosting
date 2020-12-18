<?php 
require_once('header.php');
require_once('../class/product.php');
require_once('../class/dbcon.php');
$obj= new DB();
$obj2=new Product();

?>

<?php 
if(isset($_POST['submit'])){
  $drop=isset($_POST['drop'])?$_POST['drop']:'';
  $name=isset($_POST['name'])?$_POST['name']:'';
  $url=isset($_POST['url'])?$_POST['url']:'';
  $mprice=isset($_POST['mprice'])?$_POST['mprice']:'';
  $aprice=isset($_POST['aprice'])?$_POST['aprice']:'';
  $sku=isset($_POST['sku'])?$_POST['sku']:'';
  $web_space=isset($_POST['web_space'])?$_POST['web_space']:'';
  $band=isset($_POST['band'])?$_POST['band']:'';
  $free=isset($_POST['free'])?$_POST['free']:'';
  $lang=isset($_POST['lang'])?$_POST['lang']:'';
  $mail=isset($_POST['mail'])?$_POST['mail']:'';
  $obj2->cat($drop,$name,$url,$obj->conn);
  $age = array("web_space"=>$web_space,
               "band_width"=>$band, 
               "free_domain"=>$free, 
               "mail"=>$mail, 
               "l/t_support"=>$lang);
              
   $desp= json_encode($age);
   echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  echo $desp;
   $obj2->product_entry($name,$desp,$mprice,$aprice,$sku,$obj->conn);
}



?>
<div class="header bg-primary pb-6">
<div class="container-fluid">
<div class="header-body">
<div class="row align-items-center py-4">
<div class="col-lg-6 col-7">
<h6 class="h2 text-white d-inline-block mb-0">Add Product</h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>

<li class="breadcrumb-item active" aria-current="page">Add category</li>
</ol>
</nav>
</div>

</div>
</div>
</div>
</div>

<div class="container-fluid mt--6">
<div class="row">
<div class="col">
<div class="card">
<!-- Card header -->
<div class="card-header border-0">
<h3 class="mb-0">Product</h3>
</div>
<div class="col-xl-12 order-xl-1">
<div class="card-body">
<form action="" method="POST">
<h6 class="heading-small text-muted mb-4">Enter Product Details</h6>
<h6 style="color:red;margin-left:20px">* Required Field</h6>
<div class="pl-lg-4">
<div class="row">

<div class="col-lg-6">

<div class="form-group">
<label class="form-control-label" for="input-username">Select Product Category *</label>
<!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse"> -->
<select name="select" id="select" class="form-control select" name="drop" required="">

<?php 
          
          require_once('../class/product.php');
          require_once('../class/dbcon.php');
          $obj= new DB();
          $obj2=new Product();
          $back=$obj2->cat_list($obj->conn);
         $a='<option value=""> Please Select </option>';
          foreach($back as $val){
            $a.=' <option value="'.$val['id'].'"> '.$val['prod_name'].'</option>';
          }
          $a.='</select>';
          echo $a;
          ?>
</select>
<p id="prodCategory"></p>

</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-email">Enter Product Name *</label>
<input type="text" id="proname" name="name" class="form-control productname" placeholder="Enter Product Name" pattern="^[ A-Za-z0-9_@./#$&+-]*$" required>
<p id="prodname"></p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-first-name">Page URL </label>
<input type="text" id="input-first-name" name="url" class="form-control" placeholder="Page URL">
</div>
</div>
</div>
</div>
<hr class="my-4" />
<!-- Address -->
<h6 class="heading-small text-muted mb-4">Product Description (Enter Product Description Below)</h6>
<div class="pl-lg-4">
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-username">Enter Monthly Price *</label>
<input type="text" id="proprice" name="mprice" class="form-control mpriceid" placeholder="ex: 23" required maxlength="15">
<p id="lablemprice"></p>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-email">Enter Annual Price *</label>
<input type="text" id="aprice" name="aprice" class="form-control apriceid" placeholder="ex: 23" required maxlength="15">
<p id="lableaprice"></p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-first-name">SKU *</label>
<input type="text" id="prosku" name="sku" class="form-control skuid" placeholder="SKU" required>
<p id="lablesku"></p>
</div>
</div>
</div>
</div>
<hr class="my-4" />
<!-- Address -->
<h6 class="heading-small text-muted mb-4">Features</h6>
<div class="pl-lg-4">
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-username">Web Space(in GB) *</label>
<input type="text" id="proweb" name="web_space" class="form-control webid" maxlength="5" placeholder="Web Space(in GB)" required >
<h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
<p id="lableweb"></p>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-email">Bandwidth (in GB) *</label>
<input type="text" id="proband" name="band" class="form-control bandid" maxlength="5" placeholder="Bandwidth (in GB)" required>
<h6 class="heading-small text-muted mb-4">Enter 0.5 for 512 MB</h6>
<p id="lableband"></p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-first-name">Free Domain *</label>
<input type="text" id="profree" name="free" class="form-control domainid" placeholder="Free Domain" required>
<h6 class="heading-small text-muted mb-4">Enter 0 if no domain available in this service
</h6>
<p id="labledomain"></p>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-first-name">Language / Technology *
Support</label>
<input type="text" id="prolang" name="lang" class="form-control prolang" placeholder="Language / Technology" required>
<h6 class="heading-small text-muted mb-4">Separate by (,) Ex: PHP, MySQL, MongoDB</h6>
<p id="prodlang"></p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-first-name">Mailbox *</label>
<input type="text" id="promail" name="mail" class="form-control promail" placeholder="Free Domain" required>
<h6 class="heading-small text-muted mb-4">Enter Number of mailbox will be provided, enter 0
if none</h6>
<p id="prodmail"></p>
</div>
</div>
</div>
<div class="text-center">
<input type="submit" name="submit" onsubmit="act()"  id="submit" value="Add Product" class="btn btn-primary bntn">
</div>
</div>
</form>
</div>
<?php 
require_once('footer.php');
?>
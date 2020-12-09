
<?php 



require_once('class/user.php');
require_once('class/dbcon.php');
$obj= new DB();
$obj2=new User();
if(isset($_GET['email'])){
    $m=$_GET['email'];
}
if (isset($_POST['submit'])){


    $name=isset($_POST['otp'])?$_POST['otp']:'';
    $obj2->verify($name,$m,$obj->conn);
  
}

?>

<form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>Enter Your Otp</h3>
					 <div>
						<span>OTP<label>*</label></span>
                        <input type="text" name="otp"  > 
               
                     </div>
                   
                     <input type="submit" value="submit" name="submit" class="a" >
</div>
</form>
<?php require "header.php" ?>

<?php 
require_once('class/user.php');
require_once('class/dbcon.php');
$obj= new DB();
$obj2=new User();
if (isset($_POST['submit'])) {


    $name=isset($_POST['name'])?$_POST['name']:'';
    $name=strtolower($name);
    $phone=isset($_POST['phone'])?$_POST['phone']:'';
    $userpassword=isset($_POST['pass'])?$_POST['pass']:'';
    $userpassword2=isset($_POST['repass'])?$_POST['repass']:'';
	$email=isset($_POST['email'])?$_POST['email']:'';
	$ques=isset($_POST['ques'])?$_POST['ques']:'';
	$ans=isset($_POST['ans'])?$_POST['ans']:'';
	
	
	$obj2->entry($name,$phone,$ques,$ans,$userpassword,$email, $userpassword2,$obj->conn);
	

}
?>


			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span> Name<label>*</label></span>
						<input type="text" name="name" required onkeydown="return alphaonly(event);"> 
					 </div>
					 <div>
						<span>Phone No.<label>*</label></span>
						<input type="text" name="phone" id="mobile" required> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" id="email" onkeydown="return alphaonly3(event);" required >  
					 </div>
					 <!-- <div>
						 <span>Security Question<label>*</label></span>
						 <input type="text" name="ques" > 
					 </div> -->
					 <div>
					 	 <span>Security Question<label>*</label></span>
						<select style="width:524px;height:37px; " name="ques" required>
						    <option>Select a security question</option>
							<option value="What was your childhood nickname?">What was your childhood nickname?</option>
							<option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
							<option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
							<option value="What was your dream job as a child?">What was your dream job as a child?</option>
							<option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
						</select>
					 </div>
					 <div>
						 <span>Answer<label>*</label></span>
						 <input type="text" name="ans" required onkeydown="return alphaonly2(event);"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" minlength="8" maxlength="16" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="repass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required minlength="8" maxlength="16" >
							 </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="submit" name="submit" class="a">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
			<script>
				var count=0;
				var temp=0;
				function alphaonly(button) { 
					var code = button.which;
					if(count>0 && code==32){
		         	count=0;
			       return true; 
			       
		} 
	            console.log(button.which);
                
                if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code==09)) {
					count++;
			   return true; 
		     	
				 }
				 else{
					return false;  
				 }
      
    } 
    function onlynumber(button) { 

        var code = button.which;
		
        if (code > 31 && (code < 48 || code > 57)) 
            return false; 
        return true; 
        var myval = $(this).val();
    
    } 
	function alphaonly3(button) { 
		if(temp=0 && code==46){
		         	temp=1;
			       return true;
	}  
	}

    function alphaonly2(button) { 
	console.log(button.which);
        var code = button.which;
	     if (code==32)
		return false; 
            return true; 
        
    } 


$("#mobile").bind("keyup", function (e) {

mobile_no=$("#mobile").val();

var fchar=$("#mobile").val().substr(0, 1);
var schar=$("#mobile").val().substr(1,1);
console.log(schar);

if(fchar==0) {
$('#mobile').attr('maxlength','11');
if(schar==0)
{
$("#mobile").val(0);
if(fchar=="")
{
$("#mobile").val("");
}

}
} else {
$('#mobile').attr('maxlength','10');
}
});
$("#email").bind("keypress", function (e) {


var keyCode = e.which ? e.which : e.keyCode
if (!(keyCode==46) && !(keyCode >= 48 && keyCode <= 57) && !(keyCode >= 64 && keyCode <= 90) && !(keyCode >= 97 && keyCode <= 122)) {
//console.log(keycode);
return false;
}



});
			</script>
<!-- login -->
<?php require "footer.php" ?>
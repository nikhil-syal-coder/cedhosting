<?php
require_once('class/dbcon.php');
class User{
    public$name,$phone,$ques,$ans,$userpassword,$email, $userpassword2,$conn;
    
    function entry($name,$phone,$ques,$ans,$userpassword,$email,$userpassword2,$conn){
           
    //    if($name==''||$phone==''||$ques='Select a security question'||$ans=''||$userpassword=''||$email==''||$userpassword2==''){
    //     echo "<script>alert('All Entry Must Be Required ');
    //     </script>";
    //    }
        $count=0;
        if ($userpassword != $userpassword2) {
            echo "<script>alert('Your Password and Repassword should be same');
            </script>";
        $count++;
               }
                 
        if ($count==0) {

           $sql="INSERT INTO `tbl_user` ( `email`, `name`, `mobile`, `password`, `security_question`, `security_answer`,`is_admin`)
            VALUES ( '".$email."', '".$name."', '".$phone."','".md5($userpassword)."', '".$ques."', '".$ans."',0);"; 
           

        if ($conn->query($sql)===true) {
            echo "<script>alert('signed in successfully');
            window.location.href='login.php';</script>";
                        
                        // header("Location: login.php");
                    } 
                    
                    else {
                        // echo "<center><h3 style='color:white; font-size:1.2em;'> record not created </h3></center>";
                        echo "<script>alert('Error');
                      </script>";
                    }
            
                }
            }  
            function admit($email,$password,$conn){
                $count=0;
                
                if ($count==0) {
                    
                     $sql1="SELECT * from tbl_user WHERE `email`='".$email."'
                     AND password='".md5($password)."'";
             
                     $result=$conn->query($sql1);
               
                    if ($result->num_rows > 0) {
                        while ($row= $result->fetch_assoc()) {
                            $_SESSION['userdata']=array("name"=>$row['name'],
                            "user_id"=>$row['id']);
                          
                            // print_r($_SESSION);
                            // if ($row['is_admin']==1 && $_SESSION['userdata']['name']=='admin') {
                            //     // header("Location: admin.php");
                            //     echo "<script>alert('uderrr');<script>";
                            // }
                           
                            if ($row['is_admin']==0) {
                                 if($row['active']==0){
                                    echo "<script>alert('huedu');<script>";
                                  echo "<center><h3 style='color:white; font-size:1.2em;'><b>plzz wait for admin approval your account is not verified yet</b></h3></center>";
                                }
                                else {
                                   
                                    // echo "enter";
                                    // header("Location:cab\index2.php");
                                    header("Location:index.php");
                                }
                               
                            }     
                        }
            
                    }
                    else {
                      $count++;
                      echo "<center><h3 style='color:white; font-size:1.2em;'>Invalid Login credentials</h3></center>";
                    }
                    
            }
            $conn->close();
        }
 }
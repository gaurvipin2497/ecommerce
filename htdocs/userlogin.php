<?php 

require_once("db-connection.php");
session_start();

if(isset($_POST['login']))
{

if(empty($_POST['email']) || empty($_POST['password']))
  {
    header("location: login.php?empty");
 }
 else{
 
 
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $pwd=mysqli_real_escape_string($con,$_POST['password']);
   


   $email_sql="SELECT * from users where Email='$email' and Password='$pwd'";
   $username_sql="SELECT Username,ID from users where Email='$email'";


   $email_control=$con->query($email_sql);
   

   

   $result=$con->query($username_sql);


   if($result->num_rows>0 && $email_control->num_rows>0){
    
      $row=$result->fetch_assoc();
      $_SESSION["username"]=$row["Username"];

      $_SESSION["id"]=$row["ID"];
      $_SESSION["auth"]=True;
      header("location: index.php");
      exit();
     } 
  


   else{
    header("location: login.php?wrong");
     exit();
   }
 }


}



?>
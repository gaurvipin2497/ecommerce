<?php 

require_once("db-connection.php");

session_start();



if(isset($_POST['register']))
{

if(empty($_POST['firstname']) || empty($_POST['lastname'])
 || empty($_POST['username']) || empty($_POST['phonenumber'])
  || empty($_POST['email']) || empty($_POST['password']))
  {
    header("location: register.php?empty");
    exit();
 }
 else{
   $fname=mysqli_real_escape_string($con,$_POST['firstname']);
   $lname=mysqli_real_escape_string($con,$_POST['lastname']);
   $uname=mysqli_real_escape_string($con,$_POST['username']);
   $phone=mysqli_real_escape_string($con,$_POST['phonenumber']);
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $pwd=mysqli_real_escape_string($con,$_POST['password']);
   
   
   $target_dir = "uploads/users/";
   $target_file = $target_dir .time(). basename($_FILES["picture"]["name"]);

   move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

      
   $email_sql="SELECT * from users where Email='$email'";

   $email_control=$con->query($email_sql);
  

   $uname_sql="SELECT * from users where Username='$uname'";

   $username_control=$con->query($uname_sql);




   


   if($email_control->num_rows>0 ){

      header("location: register.php?email");
      exit();
   }
   else if($username_control->num_rows>0){
      header("location: register.php?username");
      exit();
    
   }



   else{

     
      $query="INSERT INTO users (FirstName, LastName, Username, PhoneNumber, Email, Password, Picture)  VALUES ('$fname','$lname','$uname','$phone','$email','$pwd','$target_file')";
      
      $con->query($query);
      
      

      $id="SELECT ID from users where Email='$email'";

      $getid=$con->query($id);
      $row=$getid->fetch_assoc();
      $_SESSION["id"]=$row["ID"];


      $_SESSION["username"]=$uname;
      header("location: index.php");
      $_SESSION["auth"]=True;

      exit();
   
      
      
   }
 }

     
}









 



?>




<?php 
require_once("db-connection.php");
session_start();
$username=$_GET["username"];
$id=$_SESSION["id"];
$to=$_GET["to"];
$check_user="SELECT * from messages where SenderId='$username' ";
$result=$con->query($check_user);
if($result->num_rows>0){

   

}
else{
    $get_user_id="Select ID from users where Username='$username'";
    $result=$con->query($get_user_id);
    $row=$result->fetch_assoc();
    $userid=$row["ID"];
    $add_user="INSERT INTO messages (SenderId, ReceiverId,MessageText) VALUES ($userid,$id,'')";
    $con->query($add_user);

}


if(isset($_POST["send"])){
$text=$_POST["messagetext"];
$con->query("INSERT INTO messages (SenderId, ReceiverId,MessageText) VALUES ($id,$to,'$text')");


}
if(isset($_POST["deletechat"])){
    
    $con->query("DELETE from messages where SenderId=$to and ReceiverId=$id");
    
    
    }






?>
               
               
                    <div class="card mb-3">
                      <div class="card-body">


                   <!-- Page header start -->
    <div class="page-title">
      <div class="row gutters">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <h5 class="title">My Messages</h5>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
      </div>
  </div>
  <div class="content-wrapper">

   
      <div class="row gutters">

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

              <div class="card m-0">

              
                  <!-- Row start -->
                  <div class="row no-gutters">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                          <div class="users-container">
                              <ul class="users">
                                 <?php 
                                 $result=$con->query("SELECT DISTINCT * from messages inner join users on users.ID=messages.SenderId where ReceiverId='$id'  ");
                                 while($row=$result->fetch_assoc()){
                                 
                                 echo ' <a href="myprofile.php?content_id=messages&to='.$row["SenderId"].'"> <li class="person" data-chat="person1">
                                     <div class="user">
                                         <img src="'.$row["Picture"].'">
                                          <span class="status busy"></span>
                                      </div>
                                      <p class="name-time">
                                          <span class="name">'.$row["Username"].'</span>
                                          <span class="time">'.$row["Time"].'</span>
                                      </p>
                                  </li></a>';  
                                 }
                                 ?>
                     
               
                                 
                              </ul>
                          </div>
                      </div>
                      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9  ">
                          <div class="selected-user ">
                         
                          <?php 
                              
                              
                            $get_username=$con->query("SELECT Username from users where ID=$to");
                            $result=$get_username->fetch_assoc();
                                 
                              
                             echo '<span>To: <span class="name"></span>'.$result["Username"].'</span>';
                             

                             $result=$con->query("SELECT * from messages inner join users on users.ID=messages.SenderId where SenderId=$to ORDER BY MessageId DESC");
                               while($row=$result->fetch_assoc()){

                           ?> 
                            
                          </div>
                          <div class="chat-container">
                              <ul class="chat-box chatContainerScroll">
                             
                              <?php                                                            
                                if($row["MessageText"]!=""){
  
                                   echo '<li class="chat-left">
                                    <div class="chat-avatar">
                                        <img src="'.$row["Picture"].'">
                                        <div class="chat-name">'.$row["Username"].'</div>
                                    </div>
                                    <div class="chat-text">'.$row["MessageText"].'
                                        
                                    <div class="chat-hour">'.$row["AddedTime"].'<span class="fa fa-check-circle"></span></div>
                                </li>';
                                }
                              
                                                           
                                } ?> 
  <?php 
                              
                              
                            
                                
                            
  
                               $result=$con->query("SELECT * from messages inner join users on users.ID=messages.SenderId where SenderId=$id ORDER BY MessageId ASC");
                                 while($row=$result->fetch_assoc()){
  if ($row["ReceiverId"]==$to){

 
                             ?> 
                              
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                               
                                <?php                                                            
                                  if($row["MessageText"]!=""){
    
                                     echo '<li class="chat-left">
                                      <div class="chat-avatar">
                                          <img src="'.$row["Picture"].'">
                                          <div class="chat-name">'.$row["Username"].'</div>
                                      </div>
                                      <div class="chat-text">'.$row["MessageText"].'
                                          
                                      <div class="chat-hour">'.$row["AddedTime"].'<span class="fa fa-check-circle"></span></div>
                                  </li>';
                                  }
                                
                                }  
                                
                                

                                
                                  } ?> 
  
                              </ul>

                              <form action="" method="POST">
                              <div class="form-group mt-3 mb-0">
                                  <textarea class="form-control" rows="2" name="messagetext" placeholder="Type your message here..."></textarea>
                              </div>
                              <div class="d-md-flex flex-column mt-1"><button class="btn btn-primary btn-sm mt-1" type="submit" name="send">Send</button>
                              <button class="btn btn-outline-dark btn-sm mt-1"  type="submit" name="deletechat" >Delete Chat</button></div>
                              </form>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


<?php
include_once('dbconn.php');
if(isset($_POST['submit'])){
  session_start();
  $enteredemail=$_POST['username'];
  $enteredpassword=$_POST['password'];
  $sql="select * from tbluser where useremail='$enteredemail'";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $row=mysqli_fetch_assoc($result);
  if(!(empty($row))){
    // Entered Email does not exist in database
    if($row['userpassword']==$enteredpassword){
      $_SESSION['user']=$row['id'];
      header('location:index.php');
    }
    else {
      header("location:index.php?error=User does not exist");
    }
  }
  else {
    // We have found the User
    header("location:index.php?error=User does not exist");
  } 
}
?>
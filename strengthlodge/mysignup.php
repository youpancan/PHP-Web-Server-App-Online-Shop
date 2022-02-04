<?php
include_once 'User.Class.php';
include_once 'dbconnection.php';

try{
    
    if(isset($_POST['submit']))
    {
        $user = new User();
        
        $username=$_POST['username'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $passwd=$_POST['password'];
        
        $user->setUserfname($username);
        $user->setUseremail($email);
        $user->setUserphone($contact);
        $user->setUserpassword($passwd);
        
        $result = $user->create($connection);
        
        if($result == true)
        {
            
            echo "<script>alert('Account is Registered. Login to start Your session.');</script>";
            header('location:index.php?success= New account successfully created');
        }
        else{
            echo "<script>alert('Invalid username and password');</script>";
        }
    }
    
}
catch (PDOException $e)
{
    echo "Error : ".$e->getMessage();
}

?>
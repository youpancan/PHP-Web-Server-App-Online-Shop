<?php
$hostname="localhost";
$user="root";
$pass="";
$db="dbstrengthlodge";
$conn=mysqli_connect($hostname,$user,$pass,$db);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}
?>
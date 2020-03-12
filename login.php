<?php
require 'db.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT username, password, user_name, user_sname FROM user WHERE username=? AND password=?";
$statement=$connection->prepare($sql);
$statement->execute([$username, $password]);
$username=$statement->fetch();
$staff_name=$username['user_name'];
$staff_sname=$username['user_sname'];
$staff_id=$username['username'];
if(isset($staff_name) && isset($staff_sname)){
    session_start();
    $_SESSION['user_name']=$staff_name;
    $_SESSION['user_sname']=$staff_sname;
    $_SESSION['username']=$staff_id;

    header("Location:index.php");
}else{
    header("Location:register.php");
}
?>
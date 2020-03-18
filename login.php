<?php
require 'db.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT username, password, user_name, user_sname FROM user WHERE username=? AND password=?";
$statement=$connection->prepare($sql);
$statement->execute([$username, $password]);
$username=$statement->fetch();
$user_name=$username['user_name'];
$user_sname=$username['user_sname'];
$user_id=$username['username'];
if(isset($user_name) && isset($user_sname)){
    session_start();
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_sname']=$user_sname;
    $_SESSION['username']=$user_id;

    header("Location:index.php");
}else{
    header("Location:register.php");
}
?>
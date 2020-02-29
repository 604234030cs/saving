<?php
$dsn = 'mysql:host=localhost;dbname=savings';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);

}catch(PDOException $e){
    
}
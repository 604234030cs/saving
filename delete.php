<?php
require 'db.php';
$id = $_GET['list_id'];
$sql = 'DELETE FROM listsaving WHERE list_id=:list_id';
$statement = $connection->prepare($sql);
if ($statement->execute([':list_id' => $id])) {
  header("Location: index.php");
}
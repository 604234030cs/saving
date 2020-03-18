<?php require 'navbar.php'?>
<?php
require 'db.php';
session_start();
$id=$_SESSION['username'];
$sql = "SELECT listsaving.list_id,listsaving.user_id,user.username, list_type.list_type_name,listsaving.list_name,listsaving.amount,listsaving.date 
FROM user,listsaving,list_type WHERE user.username=listsaving.user_id AND listsaving.user_id like '$id' AND list_type.list_type_id=listsaving.list_type_id
AND list_type.list_type_id LIKE '1'   ";
$statement = $connection->prepare($sql);
$statement->execute();
$listsaving = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>รายการบันทึก รายรับ </h2>
      <input type="text" name="user_name" value="<?=$_SESSION['user_name']?>" readonly>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>รายการที่</th>
          <th>รหัสผู้ใช้</th>
          <th>ประเภทรายการ</th>
          <th>หมายเหตุ</th>
          <th>จำนวนเงิน</th>
          <th>วันที่</th>
        </tr>
        <?php foreach($listsaving as $person): ?>
          <tr>
            <td><?= $person->list_id; ?></td>
            <td><?= $person->user_id; ?></td>
            <td><?= $person->list_type_name; ?></td>
            <td><?= $person->list_name; ?></td>
            <td><?= $person->amount; ?></td>
            <td><?= $person->date; ?></td>
            <td>
              <a href="updatedata.php?list_id=<?= $person->list_id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?list_id=<?= $person->list_id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
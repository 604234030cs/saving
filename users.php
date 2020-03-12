<?php require 'navbar.php' ?>
<?php
require 'db.php';
session_start();
$id=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$id'";
$statement = $connection->prepare($sql);
$statement->execute([':username' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['username']) && isset($_POST['password']) ) {
  $username = $_POST['username'];
  $user_name = $_POST['user_name'];
  $user_sname = $_POST['user_sname'];
  $address = $_POST['address'];
  $phone = $_POST['phonenumber'];
  $sql = 'UPDATE user SET username=:username, user_name=:user_name, user_sname=:user_sname, address=:address, phonenumber=:phonenumber  WHERE username=:username';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':username'=> $username ,':user_name' => $user_name,':user_sname' => $user_sname, ':address'=>$address ])) {
    header("Location: index.php");
    
      }


}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลผู้ใช้</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">รหัสผู้ใช้</label>
          <input value="<?= $person->username ; ?>" type="text" name="username" id="username"  class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="user_name">ชื่อผู้ใช้</label>
          <input value="<?= $person->user_name ; ?>" type="text" name="user_name" id="user_name"  class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="username">นามสกุล</label>
          <input value="<?= $person->user_sname ; ?>" type="text" name="user_sname" id="user_sname"  class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="username">ที่อยู่</label>
          <input value="<?= $person->address ; ?>" type="text" name="address" id="address"  class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="username">ทีเบอร์โทร</label>
          <input value="<?= $person->phonenumber ; ?>" type="text" name="phonenumber" id="phonenumber"  class="form-control" readonly>
        </div>
       
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
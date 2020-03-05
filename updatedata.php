<?php
require 'db.php';
$id = $_GET['list_id'];
$sql = 'SELECT * FROM listsaving WHERE list_id=:list_id';
$statement = $connection->prepare($sql);
$statement->execute([':list_id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['list_name']) && isset($_POST['amount']) ) {
  $name = $_POST['list_name'];
  $email = $_POST['amount'];
  $sql = 'UPDATE listsaving SET list_name=:list_name, amount=:amount WHERE list_id=:list_id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':list_name' => $name, ':amount' => $email, ':list_id' => $id])) {
    header("Location: index.php");
  }


}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>แก้ไขรายการ</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="user_id">รหัสลูกค้า</label>
          <input value="<?= $person->user_id ; ?>" type="text" name="user_id" id="user_id" class="form-control">
        </div>
        <div class="form-group">
          <label for="list_type_id">ประเภทรายการ</label>
          <input value="<?= $person->list_type_id; ?>" type="text" name="list_type_id"id="list_type_id" class="form-control">
        </div>
        <div class="form-group">
          <label for="list_name">เนื่อหารายการ</label>
          <input value="<?= $person->list_name ; ?>" type="text" name="list_name"id="list_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="amount">จำนวนเงิน</label>
          <input type="text" value="<?= $person->amount ; ?>" name="amount"id="amount" class="form-control">
        </div>
        <div class="form-group">
          <label for="date">วันที่</label>
          <input type="date" value="<?= $person->date ; ?>" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
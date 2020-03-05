<?php
require 'db.php';
$sql = 'SELECT `list_id`,`user_id`,`list_type_name`,`list_name`,`amount`,`date` FROM `listsaving`,`list_type`  ';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All LISTSAVING</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>List id</th>
          <th>User id</th>
          <th>List Type</th>
          <th>List Name</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
        <?php foreach($people as $person): ?>
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
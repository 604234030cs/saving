<?php
require 'db.php';
$message = '';
if (isset ($_POST['submit'])) {
    
    $user_id = $_POST['user_id'];
    $list_type_id = $_POST['list_type_id'];
    $list_name = $_POST['list_name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $sql = "INSERT INTO listsaving('$user_id','$list_type_id','$list_name','$amount','$date')";
    echo $sql;
    $statement  = $connection->prepare($sql);
    if ($statement->execute([$user_id,$list_type_id,$list_name,$amount,$date])){
        $message = 'data inserted successfully';
        echo "The New Inserted Id Is:" .$conn ->insert_list_id;

    }
    else
    {
        

    }
        


}


?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
           <center><h2>เพิ่มรายการ รายรับ-รายจ่าย</h2></center> 
        </div>
        <div class="card-body">
             <?php if(!empty($message)):?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
             <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="user_id	">รหัสผู้ใช้</label>
                    <input type="text" name="user_id"  class="form-control" require>
                </div>
                <div class="form-group">
                    <label for="list_type_id">ประเภทรายการ</label><br>
                    <input type="radio" name="list_type_id" value="1">  รายรับ
                    <input type="radio" name="list_type_id" value="2">  รายจ่าย
                </div>
                <div class="form-group">
                    <label for="list_name">รายละเอียดรายการ</label>
                    <input type="text" name="list_name"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="amount">จำนวนเงิน</label>
                    <input type="text" name="amount"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">วันทีทำรายการ</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                 <div class="form-group">
                   <button type="submit" name ="submit" class="btn btn-info">Create a person</button>
                </div>
                

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
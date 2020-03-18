<?php
require 'db.php';
require 'navbar.php';
session_start();
$id=$_SESSION['username'];
$datevalid = date('Y-m-d', time());
$message = '';
if (isset ($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $list_type_id = $_POST['list_type_id'];
    $list_name = $_POST['list_name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $sql = 'INSERT INTO listsaving(user_id,list_type_id,list_name,amount,date)VALUES(?,?,?,?,?)';
    $title = 'กรุณากรอกข้อมูลให้ครบ';
    
    echo $title;

    $statement  = $connection->prepare($sql);
    if ($statement->execute([$user_id,$list_type_id,$list_name,$amount,$date])){
        $message = 'data inserted successfully';
        header("Location: index.php");
        session_start();
        $_SESSION['user_name']=$id;
        

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
                    <label for="user_id	">รหัสผู้ใช้ </label><font color="red"> *</font>
                    <input type="text" name="user_id" id="user_id"  class="form-control" value="<?=$_SESSION['username']?>"  require readonly>
                </div>
                <div class="form-group" require>
                    <label for="list_type_id">ประเภทรายการ</label><font color="red"> *</font><br>
                    <input type="radio" name="list_type_id"id="list_type_id" value="1" class="frome-control" >  รายรับ
                    <input type="radio" name="list_type_id"id="list_type_id" value="2" class="frome-control">  รายจ่าย
                </div>
                <div class="form-group" >
                    <label for="list_name">รายละเอียดรายการ</label><font color="red"> *</font>
                    <input type="text" name="list_name"id="list_name"  class="form-control" require>
                </div>
                <div class="form-group">
                    <label for="amount">จำนวนเงิน</label><font color="red"> *</font>
                    <input type="text" name="amount"id="amount"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">วันทีทำรายการ</label><font color="red"> *</font>
                    <input type="date" name="date" id="date" class="form-control" max="<?=$datevalid?>" require>
                </div>
                 <div class="form-group">
                   <button type="submit" name ="submit" class="btn btn-info">Create a person</button>
                </div>
                

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
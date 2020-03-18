<?php
require 'db.php';
$message = '';
if (isset ($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
    $user_sname = $_POST['user_sname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $title = '* กรุณากรอกข้อมูลให้ครบ';
    $sql = 'INSERT INTO user (username,password,user_name,user_sname,address,phonenumber)VALUES(?,?,?,?,?,?)';
    echo $title;
    
    $statement  = $connection->prepare($sql);
    if ($statement->execute([$username,$password,$user_name,$user_sname,$address,$phonenumber])){
        $message = 'data inserted successfully';
        header("Location: register.php");
        session_start();
        $_SESSION['username']=$username;
        

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
           <center><h2>เพิ่มบัญชีผู้ใช้</h2></center> 
        </div>
        <div class="card-body">
             <?php if(!empty($message)):?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
             <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">รหัสผู้ใช้</label><font color="red"> *</font>
                    <input type="text" name="username" id="username"  class="form-control" pattern = "s[0-9]{3}" title = "กรุณากรอกตัวอักษร s และตัวเลข 3 หลัก" require>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน</label><font color="red"> *</font>
                    <input type="text" name="password" id="password" class="form-control" require>
                </div>
                <div class="form-group">
                    <label for="user_name">ชื่อผู้ใช้</label><font color="red"> *</font>
                    <input type="text" name="user_name"id="user_name"  class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="user_sname">นามสกุล</label><font color="red"> *</font>
                    <input type="text" name="user_sname"id="user_sname"  class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="address">ที่อยู่</label><font color="red"> *</font>
                    <input type="text" name="address" id="address" class="form-control"require>
                </div>
                <div class="form-group">
                    <label for="phonenumber">เบอร์โทรศัพท์</label><font color="red"> *</font>
                    <input type="text" name="phonenumber" id="phonenumber" class="form-control"require>
                </div>
                 <div class="form-group">
                   <button type="submit" name ="submit" class="btn btn-info">เพิ่มบัญชีผู้ใช้</button>
                </div>
                

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php';?>
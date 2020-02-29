<?php
require 'db.php';
$messege = '';
if(isset($_POST['name']) && isset($_POST['lastname'])){
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$sql = 'INSERT INTO login(name, lastname) VALUES(:name, :lastname)';
$statement = $connection->prepare($sql);
if($statement->execute([':name' => $name, ':lastname' => $lastname])){
    header("Location: create.php");
    }

}

?>
<?php require 'header.php'; ?>
<div class="container">
<div class="card mt-5">
<div class="card-header">
<h2>Login</h2>
</div>

<div class="container login-container">
<form method = "post" >
       <div class = "form-group">
        <label for="name">Name</label>
        <input type ="text" name="name" id="name" class= "form-control">
</div>
<div class = "form-group">
        <label for="lastname">lastname</label>
        <input type ="lastname" name="lastname" id="lastname" class= "form-control">
</div>
<div class="form-group">
    <button type="submit"  class="btn btn-info">เข้าสู่ระบบ</button>
</form>
</div>
</div>
</div>
<?php require 'footer.php'; ?>
            
            
            
            
            
            
            
           

                 
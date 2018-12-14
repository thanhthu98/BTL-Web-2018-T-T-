<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ĐĂNG KÝ</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<?php
require('../db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
   $address = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con,$address);
   $Birthdate = stripslashes($_REQUEST['Birthdate']);
    $Birthdate = mysqli_real_escape_string($con,$Birthdate);
   $Callnumber = stripslashes($_REQUEST['Callnumber']);
    $Callnumber = mysqli_real_escape_string($con,$Callnumber);
   $Name = stripslashes($_REQUEST['Name']);
   $Name = mysqli_real_escape_string($con,$Name);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `khachhang` (username,password, email, trn_date,Name,address,Birthdate,Callnumber )
VALUES ('$username', '".md5($password)."', '$email', '$trn_date','$Name','$address','$Birthdate','$Callnumber')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='../login/login.php'>Login</a></div>";
        }
    }else{
?>
 <div class="form">
<h4>ĐĂNG KÝ HỌC VIÊN T&T BEAUTY</h4>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Tên Đăng Nhập" required />
<input type="text" name="Name" placeholder="Họ và Tên không dấu" required />
<input type="text" name="address" placeholder="Địa Chỉ không dấu" required />
 <br><label for="start"><br>Ngày/Tháng/Năm Sinh: </label>
<input type="date" name="Birthdate" placeholder="Ngày Sinh" required />
<input type="text" name="Callnumber" placeholder="Số điện thoại" required />
<input type="email" name="email" placeholder="Email" required />

<input type="password" name="password" placeholder="Mật Khẩu" required />
<input type="submit" name="submit" value="Đăng Ký" />
</form>
<p>Bạn đã có tài khoản? <a href='../login/login.php'>Đăng Nhập</a></p>
</div>
<?php } ?>
</body>
</html>
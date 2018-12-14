<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Nhập</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>

<?php
require('../db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `khachhang` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: ../index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='../login/login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Đăng Nhập</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Tên đăng nhập" required />
<input type="password" name="password" placeholder="Mật Khẩu" required />
<input name="submit" type="submit" value="Đăng Nhập" />
</form>
<p>Bạn chưa đăng ký? <a href='../register/register.php'>Đăng Ký</a></p>
<p> <a href='../sendmail/sign_up.php'>Quên mật khẩu?</a></p>
</div>
<?php } ?>

</body>
</html>

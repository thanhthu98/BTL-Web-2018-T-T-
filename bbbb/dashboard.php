<?php
require('db.php');
include("login/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>This is another secured page.</p>
<p><a href="index.php">Home</a></p>
<a href="logout/logout.php">Logout</a>
</div>
</body>
</html>
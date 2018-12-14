<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: ../bbbb/login/login.php");
exit(); }
?>
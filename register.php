<?php
require_once("conn.php");
session_start();

if(@$_POST["register_btn"]){
	$uname = $_POST["uname"];
	$pwd = $_POST["pwd"];
	$pwd_again = $_POST["pwd_again"];
	$tel = $_POST["tel"];   
	$sode = $_POST["code"];	
	$sql = "insert into jd_user(uname, pwd, tel) value('" . $uname . "', '" . $pwd . "', '" . $tel . "')";
	$query = $db->register($sql);
	if ($query){
		echo "<script>alert('注册成功！');location.href='index.php';</script>";
		exit;
	}else{
		echo mysql_error();
	}
}
?>
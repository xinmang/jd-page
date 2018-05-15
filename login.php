<?php
session_start();
require_once("conn.php");
if (@$_POST["login_btn"]){
	if (@$_POST["uname"] != "" && $_POST["upwd"] != ""){
		$uname = $_POST["uname"];
		$upwd = $_POST["upwd"];
		$sql = "SELECT pwd FROM jd_user WHERE uname = '$uname'";
		$rows = mysql_query($sql);
		if ($rows){
			$row = mysql_fetch_row($rows);
			if($row[0] == $upwd){
				$sql1 = "SELECT uid FROM jd_user WHERE uname = '$uname'";
				$rows1 = mysql_query($sql1);
				$row1 = mysql_fetch_row($rows1);
				$_SESSION['uname'] = $uname;
				$_SESSION['uid'] = $row1[0];
				//将cookie中的购物车商品写入数据库
				if(isset($_COOKIE['shopcar'])){
					$shopcar_list = unserialize(@$_COOKIE['shopcar']);
					if (count($shopcar_list)>1){
						for($i=1;$i<count($shopcar_list);$i++){
							$sql = "insert into jd_shopcar(suid, spid, snum) value('" . $_SESSION['uid'] . "', '" . $shopcar_list[$i] . "', '1')";
							$query = mysql_query($sql);
						}
						setcookie('shopcar', '');
					}
				}
				echo "<script language='javascript'>location.href='products.php'; </script>";
			}else{
				echo "<script language='javascript'> alert('用户名或密码错误，登录失败！'); </script>";
				echo "<script>history.back();</script>";
			}
		}else{
			echo "<script language='javascript'> alert('用户名或密码错误，登录失败！'); </script>";
			echo "<script>history.back();</script>";
		}
	}else{
		echo "<script language='javascript'> alert('用户名或密码不能为空！'); </script>";
		echo "<script>location.href='login.html';</script>";
	}
}else{
	echo "<script>history.back();</script>";
}
?>
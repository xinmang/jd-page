<?php
session_start();
require_once('conn.php');

//删除商品
if(@$_GET['do'] == 'delete_product'){
	$pid = $_GET["pid"];
	$sql = "DELETE FROM jd_product WHERE pid = '$pid'";
	$query = mysql_query($sql);
	if ($query){
		echo "<script>alert('删除成功！');history.back();</script>";
		exit;
	}else{
		echo mysql_error();
	}
}

//删除用户
if(@$_GET['do'] == 'delete_user'){
	$uid = @$_GET['uid'];
	$sql = "DELETE FROM jd_user WHERE uid = '$uid'";
	$query = mysql_query($sql);
	if ($query){
		echo "<script>alert('删除成功！');history.back();</script>";
		exit;
	}else{
		echo mysql_error();
	}
		
		
		}
//删除购物车（未登录）
//删除购物车（已登录）
if(@$_GET['do'] == 'remove'){
	$uid = @$_SESSION['uid'];
	$pid = @$_GET['pid'];
	$sql = "DELETE FROM jd_shopcar WHERE suid=$uid and spid=$pid";
	$query = mysql_query($sql);
	if($query){
		echo "<script>history.back();</script>";
	}
}
		
//删除订单
if(@$_GET['do'] == 'delete_order'){
	$oid = @$_GET['oid'];
	$sql = "DELETE FROM jd_order WHERE oid = '$oid'";
	$query = mysql_query($sql);
	if ($query){
		echo "<script>alert('删除成功！');history.back();</script>";
				exit;
			}else{
				echo mysql_error();
			}
		
		
		}
?>
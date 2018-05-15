<?php
session_start();
require_once("conn.php");

//添加商品
if(@$_POST['add_product']){
	$pname = $_POST['pname'];
	$pdetail = $_POST['pdetail'];
	$pnum = $_POST['pnum'];
	$price = $_POST['price'];
	$sql = "insert into jd_product(pname, pdetail, pnum, price) value('" . $pname . "', '" . $pdetail . "','" . $pnum . "','" . $price . "')";
	$query = mysql_query($sql);
	if ($query){
		echo "<script>alert('添加成功！');history.back();</script>";
		exit;
	}
}
//添加用户
if(@$_POST['add_user']){
	$uname = $_POST["uname"];
	$pwd = $_POST["pwd"];
	$pwd_again = $_POST["pwd_again"];
	$tel = $_POST["tel"];   
	$sode = $_POST["code"];	
	$sql = "insert into jd_user(uname, pwd, tel) value('" . $uname . "', '" . $pwd . "', '" . $tel . "')";
	$query = $db->register($sql);
	if ($query){
		echo "<script>alert('添加成功！');location.href='admin.php?page=1';</script>";
		exit;
	}else{
		echo mysql_error();
	}
}
//添加购物车 在商品列表，商品详情页已经实现


//添加订单
if(@$_GET['add_order']){
	if(@$_GET["pid"]){
		for($i=0;$i<count(@$_GET["pid"]);$i++){
			$uid = $_SESSION['uid'];//用户id 从session中获取
			$pid = $_GET["pid"][$i];
			$sql = "insert into jd_order(opid, ouid, onum, addtime) value('" . $pid . "', '" . $uid . "', '1', '" . time() . "')";
			$query = mysql_query($sql);
			//订单信息写入数据库
			$sql1 = "DELETE from jd_shopcar where suid='$uid'";//清空购物车数据库
			mysql_query($sql1);
			if ($query){
				echo "<script>alert('订单提交成功！');location.href='shopcar.php';</script>";
				exit;
			}
		}
	}
}
?>
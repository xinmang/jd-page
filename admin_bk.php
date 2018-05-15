<?php
session_start();
require_once('conn.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>后台管理</title>
<style>
	/*通用*/
	body {
		margin: 0px auto;
	}
	a {
		text-decoration: none;
	}
	a:hover {
		color: #f00;
	}
	li {
		list-style-type: none;
	}

	/*header*/
	header {
		width: 1920px;
		height: 110px;
		background-color: #e3e4e5;
	}
	.hello {
		width: 150px;
		height: 50px;
		float: right;
		margin: 50px 297px 0 0;
	}
	
	/*main*/
	#container {
		width: 1500px;
		height: 900px;
		margin: 0 auto 0 0;
	}
	#btn {
		background-color: #e3e4e5;
		width: 150px;
		float: left;
	}
        .tab_btn{
            display: block;
            line-height: 60px;
            text-align: center;
            text-decoration: none;
            color: black;
			border: 1px solid #2c2c2c;
        }
 
        .tab_div{
            //position: absolute;
            left: 0px;
            top: 0px;
            display: none;
        }
 
        .curr_div{
            display: block !important;
			//width: 900px;
			float: left;
        }

	
	#table1 {
		margin-left: 20px;
		float: left;
	}
		
	#form_th {
		background-color: #f3f3f3;
	}
	#form_th .th1 {
		width: 88px;
		height: 40px;
	}
	#form_th .th2 {
		width: 500px;
		height: 40px;
	}	
	#form_th .th3 {
		width: 88px;
		height: 40px;
	}	
	#form_th .th4 {
		width: 88px;
		height: 40px;
	}	
	#form_th .th5 {
		width: 88px;
		height: 40px;
	}	
	#form_th .th6 {
		width: 88px;
		height: 40px;
	}
	/**/
	/*添加商品*/
	#add_product_btn {
		width:900px;
		height: 60px;
	}
	#add_product_btn p {
		width: 80px;
		margin-left: 30px;
		font-size: 16px;
		background-color: #e3e4e5;
	}
	.close {
		width: 800px;
		height: 50px;
		
	}
	.close a {
		float: right;
	}
	#add_product {
		width: 850px;
		height: 450px;
		margin: 10px auto;
	}
	#add_product label {
		width: 100px;
		height: 40px;
		font-size: 25px;
		float: left;
		border: 2px solid #e3e4e5;
	}
	#add_product input {
		width: 300px;
		height: 40px;
		font-size: 25px;
		float: left;
	}	
	#add_product textarea {
		width: 700px;
		height: 40px;
		font-size: 25px;
		float: left;
	}
	#add_product .submit {
		width: 300px;
		height: 60px;
		font-size: 25px;
		float: right;
		background-color: #009688;
		margin-top: 50px;
	}
	
	
	
	
	        .black_overlay{ 
            display: none; 
            position: absolute; 
            top: 0%; 
            left: 0%; 
            width: 100%; 
            height: 100%; 
            background-color: black; 
            z-index:1001; 
            -moz-opacity: 0.8; 
            opacity:.80; 
            filter: alpha(opacity=88); 
        } 
        .white_content { 
            display: none; 
            position: absolute; 
            top: 25%; 
            left: 25%; 
            width: 55%; 
            height: 55%; 
            padding: 20px; 
            border: 10px solid #d2d2d2; 
            background-color: white; 
            z-index:1002; 
            overflow: auto; 
        } 
.btdh td{background-color:#e3e4e5;}
</style>

<script>

/***
      function getClass(className) { //className指class的值
       
                var tagname = document.getElementsByTagName('*');  //获取指定元素
                var tagnameAll = [];     //这个数组用于存储所有符合条件的元素
                for (var i = 0; i < tagname.length; i++) {     //遍历获得的元素
                    if (tagname[i].className.indexOf(className)>=0){     //如果获得的元素中的class的值等于指定的类名，就赋值给tagnameAll
                        tagnameAll[tagnameAll.length] = tagname[i];
                    }
                }
                return tagnameAll;
             
        }
        window.onload=function(){//载入事件
            var btn=getClass('tab_btn');//获取按钮数组
            var div=getClass('tab_div');//获取div数组
            for(i=0;i<btn.length;i++){
                btn[i].onclick=function(){//按钮点击事件
                    index=(this.getAttribute('index')-0);//获取是第几个按钮按下
                    if(btn[index].className.indexOf('curr_btn')>=0) return;//如果按下的按钮为当前选中的按钮则无反应
                    for(i=0;i<btn.length;i++){
                        if(index==i){
                            btn[i].className='tab_btn curr_btn';
                            div[i].className='tab_div curr_div';
                        }else{
                            btn[i].className='tab_btn';
                            div[i].className='tab_div';
                        }
                    }
                }
            }
        }
***/
//JS操作cookies方法!
//写cookies
function setCookie(name,value)
{
var Days = 30;
var exp = new Date();
exp.setTime(exp.getTime() + Days*24*60*60*1000);
document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg))
return unescape(arr[2]);
else
return null;
}
function delCookie(name)
{
var exp = new Date();
exp.setTime(exp.getTime() - 1);
var cval=getCookie(name);
if(cval!=null)
document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
</script>
</head>
<body>
	<div style="width:100%;height:100px;background-color:#fff;">
			<a href="index.php">仿京东首页</a>------
		<a href="login.html">仿京东登录页</a>------
		<a href="register.html">仿京东注册页</a>------
		<a href="products.php">商品列表</a>------
		<a href="product.php">商品详情（勿直接点击）</a>-----
		<a href="admin.php">管理员页面</a>-----
		<a href="shopcar.php">购物车</a>-----
		<a href="order.php">订单页面（勿直接点击）</a>------
		<a href="user.php">会员中心</a>
	</div>
<header>
<div class="hello"><?php if(empty($_SESSION['uname'])){?>
			<a href="login.html">你好，请登录</a>
<?php }else{
	echo $_SESSION['uname'];
	echo ",欢迎您";
}
?>
</div>
</header>
<main>




















<div id="container">
        <div id='btn'>
            <a href='javascript:void(0)' index='0' class='tab_btn curr_btn'>商品管理</a>
            <a href='javascript:void(0)' index='1' class='tab_btn'>会员管理</a>
            <a href='javascript:void(0)' index='2' class='tab_btn'>订单管理</a>
        </div>
        <div id='tab'>
            <div class='tab_div curr_div'>
<!--添加商品-->
<div id="add_product_btn">
	        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">添加商品</a></p> 
</div>			
<!--商品管理-->
			<table id="table1" align="left">
			<tr id="form_th">
				<th class="th1">商品编号</th>
				<th class="th2">商品名称</th>
				<th class="th3">图片</th>
				<th class="th4">描述</th>
				<th class="th5">库存</th>
				<th class="th6">价格</th>
				<th class="th6">操作</th>
			</tr>
			
	<?php
	$sql = "select * from jd_product";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		?>
		<tr onmouseover="this.className='btdh';" onmouseout="this.className=''">
		
		<?php
		echo "<td>".$row['pid']."</td>";
		echo "<td><a href='product.php?pid=".$row['pid']."'>".$row['pname']."</a></td>";
		echo "<td><img style='width:100px;height:100px;' src='".$row['pimg']."'></td>";
		echo "<td>".$row['pdetail']."</td><td>".$row['pnum']."</td><td>".$row['price']."</td>";
		?>
		<td>
			<a href="admin.php?do=revise&pid=<?php echo "$row[pid]" ?>">修改</a>
			|
			<a href="delete.php?pid=<?php echo "$row[pid]" ?>">删除</a>
		</td>
		</tr>
		<?php
	}
	
	?>
	</table>

        <div id="light" class="white_content">
		<div class="close">
<a  href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">关闭</a></div>
<form id="add_product" action="add.php" method="post">
	<table>
	<label>商品名</label>
	<textarea name="pname" rows="4"></textarea>
	<br/><label>图片</label>
	<textarea name="pimg" rows="4"></textarea>
	<br/><label>详情</label>
	<textarea name="pdetail" rows="4"></textarea>
	<br/><label>库存</label>
	<input type="text" name="pnum" value="" />
	<br/><label>单价</label>
	<input type="text" name="price" value="" />
	</table>
<input class="submit" type="submit" name="add_product" value="提交添加" />
</form></div> 
        <div id="fade" class="black_overlay"></div> 
	</div>
<div class='tab_div'>
<!--会员管理-->
	<div>
			<table align="left">
			<tr>
				<th>用户id</th>
				<th>用户名</th>
				<th>手机号</th>
				<th>操作</th>
			</tr>
			<tr>
	<?php
	$sql = "select * from jd_user";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		echo "<td>".$row['uid']."</td><td>".$row['uname']."</td><td>".$row['tel']."</td>";
		?>
		<td>
		<a href="admin.php?do=reset&uid=<?php echo "$row[uid]" ?>">重置密码</a>
		|
		<a href="admin.php?do=delete_user&uid=<?php echo "$row[uid]" ?>">删除用户</a></td>
		</tr>
<?php
	}
?>
	</table>
	
	        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'">添加用户</a></p> 
        <div id="light2" class="white_content"><div class="close">
<a calss="close" href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'">关闭</a></div>
    <iframe name="formsubmit" style="display:none;">
    </iframe>
<form action="add.php" method="post" target="formsubmit">
	<table>
	<label>用户名</label><input type="text" name="uname" value="" />
	<label>密码</label><input type="text" name="pwd" value="" />
	<label>二次密码</label><input type="text" name="pwd" value="" />
	<label>电话</label><input type="text" name="tel" value="" />
	<label>邮件</label><input type="text" name="email" value="" />
</table>
<input type="submit" name="" value="添加"/>
</form></div> 
        <div id="fade2" class="black_overlay"></div> 
	</div>
	</div>
</div>
<div class='tab_div'>
<?php
    $sql = "select * from jd_order";
	$res = mysql_query($sql);
	$result = mysql_query($sql);
	if(mysql_fetch_assoc($res)){
		?>
		<div id="table1">
			<table align="left">
			<tr id="form_th">
				<th class="th1">用户id</th>
				<th class="th1">    </th>
				<th class="th2">商品</th>
				<th class="th3">单价</th>
				<th class="th4">数量</th>
				<th class="th5">小计</th>
				<th class="th6">操作</th>
			</tr>
		<?php
		while($row = mysql_fetch_assoc($result)){
			$opid = $row['opid'];
			$sql1 = "select * from jd_product where pid='$opid'";
			$res1 = mysql_query($sql1);
			while($row1 = mysql_fetch_assoc($res1)){
				?>
				<tr onmouseover="this.className='btdh';" onmouseout="this.className=''">
				<?php
				echo "<td>".$row['ouid']."</td>";
				echo "<input type='hidden' name='pid' value='".$row1['pid']."'>";
				echo "<td><img style='width:100px;height:100px;' src='".$row1['pimg']."'></td>";
				echo "<td>".$row1["pname"]."</td>";
				echo "<td>".$row1["price"]."</td>";
				echo "<td>x".$row["onum"]."</td>";
				echo "<td>".$row1["price"]*$row["onum"]."</td>";
				echo "<td><a href='delete.php?do=delete_order&oid=".$row['oid']."'>删除</a></td></tr>";	
			}
		}
		?>
		</table>
		</div>
<?php
	}else{
		echo "你没有任何订单！";
	}
?>
</div>
			
			
			
			
			
			
			
	<!--重置密码-->
	<?php
		if(@$_GET['do'] == 'reset'){
			$uid = @$_GET['uid'];
			$sql = "UPDATE jd_user SET pwd='88888888' WHERE uid = '$uid'";
			$query = mysql_query($sql);
			if ($query){
				echo "<script>alert('OK,重置后密码为8个8！');history.back();</script>";
				exit;
			}else{
				echo mysql_error();
			}
		}
	
	
	?>
	
	
	
	
	
	
	
	
	
	<!--删除用户-->
<?php
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
	?>






	<!--添加产品信息-->
<?php if(@$_GET['do']=="add"){?>
	<div>
	<form action="add.php" method="post">
		名称：<input name="pname" id="pname" />
		<br />
		img：<input type="file" name="file" />
		<br />
		详情：<input name="pdetail" id="pdetail" />
		<br />
		数量：<input name="pnum" id="pnum" />
		<br />
		价格：<input name="price" id="price" />
		<br />
		<input type="submit" name="addproduct" id="addproduct" value="添加">
	</form>
	</div>
<?php }?>
	
	
	
	
	
	
	
	
	
	
	<!--修改产品信息-->
	<div>
	<?php
		if(@$_GET['do']=='revise'){
			if(@$_GET['pid']){
				$pid = $_GET['pid'];
				$sql = "select * from jd_product where pid=$pid";
				$res = mysql_query($sql);
				while($row = mysql_fetch_assoc($res)){
					?>
					<table>
						<tr>
							<th>商品编号(不可修改)</th>
							<th>商品名称</th>
							<th>描述</th>
							<th>数量</th>
							<th>价格</th>
							<th>操作</th>
						</tr>
						<tr>
							<td><input type="text" disabled="disabled" placeholder="<?php echo $row['pid'] ?>" /></td>
							<td><input type="text" placeholder="<?php echo $row['pname'] ?>"  /></td>
							<td><input type="text" placeholder="<?php echo $row['pdetail'] ?>" /></td>
							<td><input type="text" placeholder="<?php echo $row['pnum'] ?>"  /></td>
							<td><input type="text" placeholder="<?php echo $row['price'] ?>" /></td>
							<td>添加图片|提交修改</td>
						</tr>
					</table>
					<?
				}
			}
		}
		?>
	</div>
	</div>
	</div>
</main>
<footer>
<div>底部</div>
</footer>
</body>
</html>
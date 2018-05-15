<?php
session_start();
require_once('conn.php');
if(empty($_GET['page'])){
	$_GET['page'] = '0';
}
?>
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
		width: 1330px;
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
		width: 148px;
		height: 40px;
	}
	
	
		#form_th1 {
		background-color: #f3f3f3;
		margin-left: 20px;
	}
	#form_th1 .th1 {
		width: 166px;
		height: 40px;
	}
	#form_th1 .th2 {
		width: 160px;
		height: 40px;
	}	
	#form_th1 .th3 {
		width: 88px;
		height: 40px;
	}	
	#form_th1 .th4 {
		width: 88px;
		height: 40px;
	}	
	#form_th1 .th5 {
		width: 88px;
		height: 40px;
	}	
	#form_th1 .th6 {
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
		background-color: #e3e4e5;border: 2px solid #000;
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
.btdh td{
	background-color:#e3e4e5;
	}
</style>

    <script>
    function update(obj,x){
    var table = document.getElementById("table1");
	text1 = table.rows[x].cells[0].innerHTML;
    for(var i=0;i<table.rows[x].cells.length-1;i++){
		var text = table.rows[x].cells[i].innerHTML;
		table.rows[x].cells[i].innerHTML = '<input class="input" name="input'+ x + '" type="text" value=""/>';
		var input = document.getElementsByName("input" + x);
		input[i].value = text;
		input[0].focus();
		input[0].select();
    }
	table.rows[x].cells[0].innerHTML = text1;
    obj.innerHTML = "确定";
    obj.onclick = function onclick(event) {
		var text = table.rows[x].cells[0].innerHTML;
		table.rows[x].cells[0].innerHTML = '<input class="input" name="input'+ x + '" type="text" value="'+text+'"/>';
                    update_success(this,x)
                    };
    }
    function update_success(obj,x){
        var arr = [];
        var table = document.getElementById("table1");
        var input = document.getElementsByName("input" + x);
        for(var i=0;i<table.rows[x].cells.length-1;i++){
        var text = input[i].value;
        arr.push(text);
        }
        //把值赋值给表格，不能在取值的时候给，会打乱input的个数
        for(var j=0;j<arr.length;j++){
            table.rows[x].cells[j].innerHTML = arr[j];
        }
        //回到原来状态
        obj.innerHTML = "修改";
        obj.onclick = function onclick(event) {
                    update(this,x)
                    };
        alert(arr + ",传到后端操作成功，刷新页面");
		console.log(arr[0]);
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
<?php
if(@$_SESSION['uname'] != "admin"){
	?>
	<p>你没有权限访问本页的内容！</p>
	<?php
}else{
	if($_GET['page']=='0'){
		//商品管理
?><div id="container">
        <div id='btn'>
            <a href='admin.php?page=0' class='tab_btn curr_div' style="width:148px">商品管理</a>
            <a href='admin.php?page=1' class='tab_btn'>会员管理</a>
            <a href='admin.php?page=2' class='tab_btn'>订单管理</a>
        </div>
        <div id='tab'>
            <div class='tab_div curr_div'>
<!--添加商品-->
<div id="add_product_btn">
	        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">添加新商品</a></p> 
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
	$i = 1;
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
			<!--<a href="admin.php?do=revise&pid=<?php echo "$row[pid]" ?>">修改</a>--><button onclick="update(this,<?php echo $i ?>)">修改</button>
			|
			<a href="delete.php?do=delete_product&pid=<?php echo "$row[pid]" ?>">删除</a>
		</td>
		</tr>
		<?php
		$i++;
	}
	
	?>
	</table>
<!--添加商品-->
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
	</div>
<?php
	}
	if($_GET['page'] == '1'){
		//用户管理
?>
<div id="container">
        <div id='btn'>
            <a href='admin.php?page=0' index='0' class='tab_btn'>商品管理</a>
            <a href='admin.php?page=1' index='1' class='tab_btn curr_div' style="width:148px">会员管理</a>
            <a href='admin.php?page=2' index='2' class='tab_btn'>订单管理</a>
        </div>
        <div id='tab'>
<div class='tab_div curr_div'>
<!--会员管理-->
	<div id="add_product_btn">
	        <p><a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'">添加新用户</a></p>
	</div>
        <div id="light2" class="white_content"><div class="close">
<a calss="close" href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'">关闭</a></div>
    <iframe name="formsubmit" style="display:none;">
    </iframe>
<form action="add.php" method="post" target="formsubmit">
	<table style="font-size:16px;" >
	<label style="margin:20px;">用户名</label><input type="text" name="uname" value="" /><br />
	<label style="margin:20px;">密码</label><input type="text" name="pwd" value="" /><br />
	<label style="margin:20px;">二次密码</label><input type="text" name="pwd_again" value="" /><br />
	<label style="margin:20px;">电话</label><input type="text" name="tel" value="" /><br />
	<label style="margin:20px;">邮件</label><input type="text" name="email" value="" /><br />
	</table>
<input type="submit" name="add_user" value="提交添加"/>
</form></div> 
        <div id="fade2" class="black_overlay"></div> 
	</div>
	<div style="float:left;">
			<table id="form_th1" align="left">
			<tr>
				<th class="th1">用户id</th>
				<th class="th1">用户名</th>
				<th class="th2">手机号</th>
				<th class="th2">操作</th>
			</tr>
	<?php
	$sql = "select * from jd_user";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		?>
		<tr onmouseover="this.className='btdh';" onmouseout="this.className=''">
		<td><?php echo "$row[uid]" ?></td><td><?php echo "$row[uname]" ?></td><td><?php echo "$row[tel]" ?></td>
		<td>
		<a href="admin.php?page=1&do=reset&uid=<?php echo "$row[uid]" ?>">重置</a>
		|
		<a href="delete.php?do=delete_user&uid=<?php echo "$row[uid]" ?>">删除</a>
		|
		编辑</td>
		</tr>
<?php
	}
?>
	</table>
	</div>
</div>
</div>
<?php
	}
	if($_GET['page'] == '2'){
		//订单管理
?>
<div id="container">
        <div id='btn'>
            <a href='admin.php?page=0' index='0' class='tab_btn'>商品管理</a>
            <a href='admin.php?page=1' index='1' class='tab_btn'>会员管理</a>
            <a href='admin.php?page=2' index='2' class='tab_btn curr_div' style="width:148px">订单管理</a>
        </div>
        <div id='tab'>
<div class='tab_div curr_div'>
<?php
    $sql = "select * from jd_order order by oid desc";
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
				<th class="th5">时间</th>
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
				echo "<td>".date('Y-m-d H:m:s',$row['addtime'])."</td>";
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
</div>
<?php		
	}
}
?>
</main>
	<!--重置密码-->
	<?php
		if(@$_GET['do'] == 'reset'){
			$uid = @$_GET['uid'];
			$sql = "UPDATE jd_user SET pwd='88888888' WHERE uid = '$uid'";
			$query = mysql_query($sql);
			if ($query){
				echo "<script>alert('OK,随机密码发送至邮箱！无邮箱默认为123。');history.back();</script>";
				exit;
			}else{
				echo mysql_error();
			}
		}
	
	
	?>
<footer>
<div>底部</div>
</footer>
</body>
</html>
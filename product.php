<?php
session_start();
require_once('conn.php');
	//未登录使用cookie 添加商品到购物车 变量商品id
	//加入购物车
	function add_shopcar($pid){
		if(empty($_COOKIE['shopcar'])){
			$shopcar = array();
			$shopcar[0] = 0;
			array_push($shopcar, $pid);
			$shopcar_list = serialize($shopcar);        //序列化存入cookie
			setcookie('shopcar', $shopcar_list);
		}else{
			$shopcar = array();
			$shopcar = unserialize($_COOKIE['shopcar']);
			$shopcar[0] = 0;
			array_push($shopcar, $pid);
			$shopcar = array_unique($shopcar);          //舍弃重复元素
			$shopcar_list = serialize($shopcar);        //序列化存入cookie
			setcookie('shopcar', $shopcar_list);
		}
	}
if(empty($_SESSION['uid'])){	
	if (@$_GET['add_shopcar']){
		$pid = @$_GET['add_shopcar'];
		add_shopcar($pid);
		print "添加购物车成功！";
	}
}else{
	if (@$_GET['add_shopcar']){
		$uid = $_SESSION['uid'];
		$pid = @$_GET['add_shopcar'];
		$sql = "insert into jd_shopcar(suid, spid, snum) value('" . $_SESSION['uid'] . "', '" . $pid . "', '1')";
		$query = mysql_query($sql);
		}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> 
	<title>产品详情页</title>
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
        *{margin:0;padding:0;} 
        input{width:120px;height:30px;cursor:pointer;} 
        #note{position:absolute;width:150px;padding:8px;background:#eee;border:1px solid #ccc;left:40%;z-index:9999;display:none;} 
	/*顶部*/
	header {
		width: 100%;
		height: 123px;
		
		
	}
	#top {
		width: 100%;
		border-bottom: 1px solid #ddd;
		background-color: #e3e4e5;
		height: 30px;
	}
	#top #local {
		position: relative;
		display: inline;
	}
	#top #local .local_alert {
		width: 220px;
		margin-left: 550px;
		position: absolute;
		display: none;
		background-color: #f9f9f9;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		z-index: 999;
	}
	#top #local:hover .local_alert{
		display: block;
	}
	#top #local i {
		padding-left: 550px;
	}
	#top .top1 {
		width: 100%;
		height: 100%;
		padding-left: 100px;
		display: inline;
	}
	#top i .iconfont {
		position: absolute;
		right: 5px;
		top: 10px;
		width: 12px;
		height: 12px;
		line-height: 12px;
		font-family: iconfont;
		font-style: normal;
	}
	#top #myjd{
		display: inline;
	}
	#top #kehufuwu {
		display: inline;
	}
	#top #daohang {
		display: inline;
	}
	#myjd {
		position: relative;
	}
	#myjd .myjd_alert {
		width: 220px;
		margin-left: 780px;
		position: absolute;
		display: none;
		background-color: #f9f9f9;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		z-index: 999;
	}
	#myjd:hover .myjd_alert {
		display: block;
	}
		#myjd:hover {
		background-color: #f9f9f9;
	}
	#kehufuwu {
		position: relative;
	}
	#kehufuwu .kehufuwu_alert {
		width: 500px;
		height: 100px;
		margin-left: 740px;
		position: absolute;
		display: none;
		background-color: #f9f9f9;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		z-index: 999;
	}
	#kehufuwu:hover .kehufuwu_alert {
		display: block;
	}
		#kehufuwu:hover {
		background-color: #f9f9f9;
	}
	#kehufuwu .kehufuwu_alert dt {
		float: left;
	}
	#kehufuwu .kehufuwu_alert dd {
		float:left;
		text-algin:center;
	}
	
	#daohang {
		position: relative;
	}
	#daohang .daohang_alert {
		position: absolute;
		display: none;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		margin-left: 1200px;
		z-index: 999;
	}
	#daohang:hover .daohang_alert {
		display: block;
	}
	#daohang:hover {
		background-color: #f9f9f9;
	}	
	.logo {
		margin-left: 330px;
	}
	
	
	.search {
		width: 547px;
		margin-top: -40px;
		margin-left: 630px;
	}
	.search .search_box {
		float: left;
		width: 520px;
		height: 36px;
		background: #f10215;
		position: relative;
	}

	.search .search_box .search_txt {
		width: 463px;
		height: 28px;
		float: left;
		margin-top: 1px;
		margin-left: 1px;
		padding: 1px;
	}
	.search .search_box button {
		border-radius: 0;
		right: 0;
		width: 50px;
		height: 35px;
		line-height: 35px;
		border: none;
		background-color: #f10215;
		font-size: 20px;
		font-weight: 700;
		color: #fff;
	}

	.my_shopcar {
		width: 190px;
		height: 35px;
		margin-top: 10px;
		margin-left: 90px;
		color: #666;
		padding: 2px solid;
		right: 99px;
		top: 25px;
		display: inline-block;
	}
	.my_shopcar b {
		color: #f00;
		padding: 10px 20px 10px 20px;
		border: 2px solid #e3e4e5;
	}
	.my_shopcar .my_shopcar_alert {
		display: none;
		float: right ;
		margin-right: 60px;
		background-color: #f9f9f9;
		min-width: 280px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
	}
	.my_shopcar:hover .my_shopcar_alert {
		display: block;
	}
	
	/* main */
	main {
		height: 2440px;
	}
	main #main_top1 {
		width: 1200px;
		font-size: 50px;
		margin: 10px auto;
		
	}
	main #main_top2 {
		width: 100%;
		padding-left: 250px;
		font-size: 30px;
		background-color: #e3e4e5;
		margin: 10px auto;
		
	}
	main #product_box {
		width: 1200px;
		height: 500px;
		margin: 30px auto;
		border: 2px solid #e3e4e5;
	}
	main #product_box .imgs {
		width: 400px;
		height: 400px;
		float: left;
		margin-top: 40px;
		margin-left: 60px;
		border: 2px solid #e3e4e5;
	}
	main #product_box .imgs img{
		width: 400px;
		height: 400px;
	}
	
	main #product_box .pname {
		font-size: 20px;
		margin-top: 30px;
		margin-left: 500px;
	}
	main #product_box .pdetail {
		margin-top: 10px;
		margin-left: 500px;
		font-size: 20px;
	}	
	main #product_box .price {
		font-size: 20px;
		margin-top: 10px;
		margin-left: 500px;
	}	
	main #product_box .pnum {
		font-size: 20px;
		margin-top: 10px;
		margin-left: 500px;
	}	
	main #product_box .num {
		font-size: 20px;
		margin-top: 10px;
		margin-left: 500px;
	}
	
	main #product_box .add {
		width: 550px;
		height: 150px;
		margin-top: 100px;
		margin-left: 100px;
		float: left;
	}
	main #product_box .add .add_shopcar{
    width: 190px;
    height: 35px;
    border: 2px solid #e01222;
    font-size: 17px;
    text-align: center;
    background-color: #e01222;
	    margin-left: 90px;
    margin-top: 21px;
	}
	main #product_box .add p{
		width: 100%;
		height: 100%;
		color: #fff;
		margin: 0 auto;
	}
	main #product_box .add .add_order {
	width: 190px;
    height: 35px;
    border: 2px solid #009688;
    font-size: 17px;
    text-align: center;
    background-color: #009688;
	margin-top: 20px;
	float: left;
	display: inline;
	}
	
	#renqiremen {
		width: 1200px;
		height: 200px;
		margin-left: 350px;
		border: 2px solid #e3e4e5;
	}
	#renqiremen .text {
		border: 2px solid #e3e4e5;
	}
	

	
	#huorenyuyue {
		border: 1px solid #ddd;
		width: 250px;
		height: 1400px;;
		background-color: #fff;
		float: left;
		margin-left: 350px;
		margin-top: 50px;
	}
	#product {
		width: 200px;
		height: 300px;
		float: left;
		margin: 10px;
		border: 1px solid #ddd;
		
	}
	#product img {
		
		width:100px;
		height:100px;
	}
	#product .contect {
		width: 200px;
		height: 250px;
	}
	#product .add_shopcar {
		width: 100px;
		height: 30px;
		float: right;
		margin-right: 10px;
		margin-bottom: 10px;
	}
	
	
	#shangpingjieshao {
		width: 900px;
		height: 1500px; 
		border: 2px solid #e3e4e5;
		float: left;
		margin-top: 50px;
		margin-left: 20px;
	}
	#shangpingjieshao .box_top {
		height: 50px;
		border: 2px solid #e3e4e5;
	}
	#shangpingjieshao .box_top .text {
		text-align: center;
		width: 150px;
		height: 50px;
		border: 2px solid #e3e4e5;
		float: left;
	}
	#shangpingjieshao .box_contect {
		margin-top: 20px;
	}
	
	
	
	
	
	
	
	/*footer*/
	
	footer .footerimg {
		margin: 0 auto;
		text-align: center;
		background-color: #f5f5f5;
	}
	.links {
		padding-left: 500px;
		padding-bottom: 10px;
		border-bottom: 1px solid #dddddd;
	}
	.links dl {
		width: 160px;
		height: 168px;
		float: left;
	}
	.links dl dt {
		font: 500 16px 'microsoft yahei';
		line-height: 35px;
	}
	.links dl dd {
		line-height: 20px;
	}
	footer .footer_btm {
		clear: both;
		margin: 10px auto;
	}
	footer .footer_btm p {
		line-height: 5px;
		text-align: center;
	}
	</style>
		<script>
        $(function(){ 
            $('button').click(function(){ 
                if(!$('#note').is(':visible')){ 
                    $('#note').css({display:'block', top:'-100px'}).animate({top: '+300'}, 500, function(){ 
                        setTimeout(out, 3000); 
                    }); 
                }
            }); 
        }); 
 
        function out(){ 
            $('#note').animate({top:'0'}, 500, function(){ 
                $(this).css({display:'none', top:'-100px'}); 
            }); 
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
<div id="note">添加购物车成功!</div> 
	<header>
		<div id="top">
			<div id="local">
				<i>四川</i>
			<div class="local_alert">
				<li>北京 上海 天津 重庆 河北</li>
				<li>山西 河南 辽宁 吉林 黑龙江</li>
				<li>内蒙古 江苏 山东 安徽 浙江</li>
				<li>福建 湖北 湖南 广东 广西</li>
				<li>江西 四川 海南 贵州 云南</li>
				<li>西藏 陕西 甘肃 青海 宁夏</li>
				<li>新疆 港澳 台湾 钓鱼岛 海外</li>
			</div>
			</div>
			<div class="top1"><?php if(empty($_SESSION['uname'])){?>
			<a href="login.html">你好，请登录</a>
			<a href="register.html">免费注册</a>
<?php }else{
	echo $_SESSION['uname'];
	echo ",欢迎您";
}
?>
			<span>|</span>
			<a href="#">我的订单</a>
			<span>|</span>
			<div id="myjd">
				<a href="#">我的京东</a>
				<i class="iconfont">∨</i>
				<div class="myjd_alert">
				<ul>
					<li>待处理订单 消息</li>
					<li>返修退换货 我的问答</li>
					<li>降价商品 我的关注</li>
					<li>我的京豆 我的优惠券</li>
					<li>我的白条 我的理财</li>
				</ul>
				</div>
			</div>
			<span>|</span>
			<a href="#">京东会员</a>
			<span>|</span>
			<a href="#">企业采购</a>
			<span>|</span>
			<div id="kehufuwu">
				<a href="#">客户服务</a>
				<i class="iconfont">∨</i>
				<div class="kehufuwu_alert">
					<dl>
						<dt>客户</dt>
							<dd>帮助中心 售后服务</dd>
							<dd>在线客服 意见建议</dd>
							<dd>电话客服 客服邮箱</dd>
							<dd>金融咨询 售全球客服</dd>
						<dt>商户</dt>
							<dd>合作招聘 学习中心</dd>
							<dd>商家后台 京麦工作台</dd>
							<dd>商家帮助 规则平台</dd>
					</dl>
				</div>
			</div>
			<span>|</span>
			<div id="daohang">
			<a href="#">网站导航</a>
			<i class="iconfont">∨</i>
				<div class="daohang_alert">
				<dl>
					<dt>1</dt>
						<dd>11</dd>
						<dd>12</dd>
					<dt>2</dt>
						<dd>21</dd>
						<dd>22</dd>
					<dt>3</dt>
						<dd>31</dd>
						<dd>32</dd>
				</dl>
				</div>
			</div>
			<span>|</span>
			<a href="#">手机京东</a>
			</div>
		</div>
			<img src="imgs/logo.png" class="logo" />
	        <div class="search">
				<div class="search_box">
					<input type="text" class="search_txt" name="search">
					<button><i></i></button>
				</div>
			</div>
			 
        <div class="my_shopcar">
            <b>我的购物车 0</b>
            <div class="my_shopcar_alert">
                <span>购物车中还没有商品，赶紧选购吧！</span>
            </div>
        </div>
	</header>
	<main>
	<div id="main_top1">电脑自营旗舰店</div>
	<div id="main_top2">促销优惠|首页|全部商品|XPS专区|笔记本|台式机|外星人|配件|显示器|原厂服务|企业采购</div>
	<div id="product_box">
<?php
if(@$_GET["pid"]){
	$pid = $_GET["pid"];
	$sql = "select * from jd_product where pid = $pid";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){?>
		<div class="imgs"><img src='<?php echo $row['pimg'] ?>'></div>
		<div class="pname"><?php echo $row["pname"] ?></div>
		<div class="pdetail"><?php echo $row["pdetail"] ?></div>
		<div class="price">单价：¥<?php echo $row["price"] ?></div>
		<div class="pnum">库存：<?php echo $row["pnum"] ?></div>
		<div class="num">购买的数量：1</div>
		<div class='add'>
		<button class='add_shopcar'>
		<a href='product.php?pid=<?php echo $pid ?>&add_shopcar=<?php echo $pid ?>' ><p>加入购物车</p></a>
		</button>
		<div class='add_order'>
		<a href='order.php?pid=<?php echo $pid ?>' ><p>一键购</p></a>
		</div>
		</div>
<?php 

		}
	}
?>
	</div>
	<div id="renqiremen">
		<div class="text">
		<span>人气热门</span>|<span>鼠标</span>|<span>键盘</span>|<span>双肩包</span>|<span>显示器</span>|<span>移动硬盘</span>
		</div>
	</div>
	<div id="huorenyuyue">
	火热预约
	<?php
	$sql = "select * from jd_product limit 0,4";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){ ?>
		<div id='product'>
			<div class='contect'>
				<a href='product.php?pid=<?php echo $row['pid']; ?>'>
					<img src='<?php echo $row['pimg']; ?>'>
					<div style='font-size: 20px;color: #f00;'>
						¥<?php echo $row['price']; ?>
					</div>
					<div>
						<?php echo $row['pname'];echo $row['pdetail']; ?>
					</div>
				</a>
			</div>
			<div class='add_shopcar'>
					<button>加入购物车</button>
			</div>
		</div>
	<?php
	}
	?>
	</div>
	
	<div id="shangpingjieshao">
		<div class="box_top">
			<div class="text">商品介绍</div>
			<div class="text">规格与包装</div>
			<div class="text">售后保障</div>
			<div class="text">商品评价(4700+)</div>
			<div class="text">预约说明</div>
		</div>
		<div class="box_contect">
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>	
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>		
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>				
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>			
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
				这里有很多图<br>
		</div>
	</div>
	</main>
	<footer>
	<div class="footerimg">
	<img src="imgs/footer.png" />
	</div>
	<div class="links">
		<div>
		<dl>
			<dt>购物指南</dt>
			<dd>
				购物流程<br/>
				会员介绍<br/>
				生活旅行<br/>
				常见问题<br/>
				大家电<br/>
				联系客服
			<dd>
			</dl>
		</div>
		<div>
		<dl>
			<dt>配送方式</dt>
			<dd>
				上门自提<br/>
				211限时达<br/>
				配送服务查询<br/>
				配送费收取标准<br/>
				海外配送
			</dd>
		</dl>
		</div>
		<div>
		<dl>
			<dt>支付方式</dt>
			<dd>
				货到付款<br/>
				在线支付<br/>
				分期付款<br/>
				邮局汇款<br/>
				公司转账
			</dd>
		</dl>
		</div>
		<div>
			<dl>
				<dt>售后服务</dt>
				<dd>
				售后政策<br/>
				价格保护<br/>
				退款说明<br/>
				返修/退换货<br/>
				取消订单
				</dd>
			</dl>
		</div>
		<div>
		<dl>
			<dt>特色服务</dt>
			<dd>
				夺宝岛<br/>
				DIY装机<br/>
				延保服务<br/>
				京东E卡<br/>
				京东通信<br/>
				京东JD+
			</dd>
		</dl>
		</div>
	</div>

	<div class="footer_btm">
		<p>
			关于我们|联系我们|联系客服|合作招商|商家帮助|营销中心|手机京东|友情链接|销售联盟|京东社区|风险监测|隐私政策|京东公益|English Site|Media & IR
		</p>
		<p>
			京公网安备 11000002000088号|京ICP证070359号|互联网药品信息服务资格证编号(京)-经营性-2014-0008|新出发京零 字第大120007号
		</p>
		<p>
			互联网出版许可证编号新出网证(京)字150号|出版物经营许可证|网络文化经营许可证京网文[2014]2148-348号|违法和不良信息举报电话：4006561155
		</p>
		<p>
			Copyright © 2004 - 2017  京东JD.com 版权所有|消费者维权热线：4006067733经营证照
		</p>
		<p>
			京东旗下网站：京东支付|京东云
		</p>
	</div>
	</footer>
</body>
</html>
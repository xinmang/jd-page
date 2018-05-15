<?php
session_start();
require_once('conn.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>订单页面</title>
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

	/*顶部*/
	header {
		width: 100%;
		height: 200px;
		
		
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
		width: 900px;
		height: 1200px;
		margin: 10px auto;
	}
	
	#form_th {
		background-color: #f3f3f3;
	}
	#form_th .th1 {
		width: 88px;
		height: 40px;
	}
	.submit {
		width: 100px;
		height: 50px;
		text-align: center;
		font-size: 23px;
		color: #fff;
		border: 2px solid #e54346;
		background-color: #e54346;
		float: right;
		
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
	<div id="order_top">我的订单</div>
<?php 
if (empty($_SESSION['uid'])){
	echo ("未登录，请先登录！");
}else{
	if(@$_GET["pid"]){
?>
	<form action="add.php" method="get">
	<table align="left" style="width:900px;">
			<tr id="form_th">
				<th></th>
				<th>商品</th>
				<th></th>
				<th></th>
				<th class="th1">单价</th>
				<th class="th1">数量</th>
			</tr>
			<tr>
	<?php
	$arr = array();
		for($i=0;$i<count(@$_GET["pid"]);$i++){
			$pid = $_GET["pid"][$i];
			$sql = "select * from jd_product where pid=$pid";
			$res = mysql_query($sql);
			while($row = mysql_fetch_assoc($res)){
				echo "<td><input type='hidden' name='pid[]' value='".$row['pid']."'></td>";
				echo "<td><img style='width:100px;height:100px;' src='".$row['pimg']."'></td>";
				echo "<td>".$row["pname"]."</td>";
				echo "<td>".$row["pdetail"]."</td>";
				echo "<td>".$prices=$row["price"]."</td>";
				echo "<td>x1</td></tr>";
				array_push($arr, $prices);
			}
		}
		?>
			</table>
	<div>
		<div>总价：</div><div>¥<?php echo array_sum($arr); ?></div>
		<input class="submit" type="submit" name="add_order" value="提交订单" />
	</div>
	</form>
		
		
		<?php
	}
}
?>
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
<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>京东首页</title>
	<link href="css/index.css" type="text/css" rel="stylesheet">
	  <script type="text/javascript">
    function $(id) {
      return typeof id==='string'?document.getElementById(id):id;
    }
    window.onload=function(){
      var index=0;
      var timer=null;
      var pic=$("pic").getElementsByTagName("li");
      var num=$("num").getElementsByTagName("li");
      var flash=$("flash");
      var left=$("left");
      var right=$("right");
      //单击左箭头
      left.onclick=function(){
        index--;
        if (index<0) {index=num.length-1};
        changeOption(index);
      }
      //单击右箭头
      right.onclick=function(){
        index++;
        if (index>=num.length) {index=0};
        changeOption(index);
      }      
      //鼠标划在窗口上面，停止计时器
      flash.onmouseover=function(){
        clearInterval(timer);
      }
      //鼠标离开窗口，开启计时器
      flash.onmouseout=function(){
        timer=setInterval(run,2000)
      }
      //鼠标划在页签上面，停止计时器，手动切换
      for(var i=0;i<num.length;i++){
        num[i].id=i;
        num[i].onmouseover=function(){
          clearInterval(timer);
          changeOption(this.id);
        }
      }    
      //定义计时器
      timer=setInterval(run,2000)
      //封装函数run
      function run(){
        index++;
        if (index>=num.length) {index=0};
        changeOption(index);
      }
      //封装函数changeOption
      function changeOption(curindex){
        console.log(index)
        for(var j=0;j<num.length;j++){
          pic[j].style.display="none";
          num[j].className="";
        }
        pic[curindex].style.display="block";
        num[curindex].className="active";
        index=curindex;
      }
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
<!--顶部-->
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
			<img src="imgs/logo.gif" class="logo" />
	        <div class="search">
				<div class="search_box">
					<input type="text" placeholder="派克钢笔" class="search_txt" name="search">
					<button><i></i></button>
				</div>
				<ul class="search_content">
					<li><a href="#"><span>666飞全球</span></a></li>
					<li><a href="#">500元神券</a></li>
					<li><a href="#">农林机械</a></li>
					<li><a href="#">5折嗨购</a></li>
					<li><a href="#">亿元礼券</a></li>
					<li><a href="#">增压花洒喷头</a></li>
				</ul>
			</div>
			 
        <div class="my_shopcar">
            <b>我的购物车 0</b>
            <div class="my_shopcar_alert">
                <span>购物车中还没有商品，赶紧选购吧！</span>
            </div>
        </div>
		<ul class="nav">
			<li><a href="#">秒杀</a></li>
			<li><a href="#">优惠券</a></li>
			<li><a href="#">闪购</a></li>
			<li><a href="#">拍卖</a></li>
			<span>|</span>
			<li><a href="#">服装城</a></li>
			<li><a href="#">京东超市</a></li>
			<li><a href="#">生鲜</a></li>
			<li><a href="#">全球购</a></li>
			<span>|</span>
			<li><a href="#">京东金融</a></li>
		</ul>
	</header>
	<!--nav-->
	<main>
	<!--nav_box-->
		<div class="nav_box">
			<div class="tongyong">
			<div id="jiayongdianqi">
			<li>家用电器</li>
				<div class="li">
					<div class="li_alert">
					<span>家电馆</span><span>家电馆</span><span>家电馆</span><span>家电馆</span><span>家电馆</span>
					<dl>
					<dt>电视</dt>
						<dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd>
					</dl>
					<dl>
					<dt>电视</dt>
						<dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd>
					</dl>
					<dl>
					<dt>电视</dt>
						<dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd><dd>曲面电视</dd>
					</dl>
					</div>
				</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="shouji">
			<li>手机/运营商/数码</li>
			<div class="li">
					<div class="li_alert">
					<span>手机</span><span>手机</span><span>手机</span><span>手机</span><span>手机</span>
					<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
					<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
					<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
					</div>
				</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="diannao">
			<li>电脑/办公</li>
					<div class="li">
						<div class="li_alert">
					<dl>
					<dt>电脑</dt>
						<dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd>
					</dl>
					<dl>
					<dt>电脑</dt>
						<dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd>
					</dl>
					<dl>
					<dt>电脑</dt>
						<dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd><dd>电脑</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="jiaju">
			<li>家居/家具/家装/厨具</li>
				<div class="li">
						<div class="li_alert">
											<dl>
					<dt>家具</dt>
						<dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd>
					</dl>
					<dl>
					<dt>家具</dt>
						<dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd>
					</dl>
					<dl>
					<dt>家具</dt>
						<dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd><dd>家具</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="nanzhuang">
			<li>男装/女装/童装/内衣</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>男装</dt>
						<dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd>
					</dl>
					<dl>
					<dt>男装</dt>
						<dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd>
					</dl>
					<dl>
					<dt>男装</dt>
						<dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd><dd>男装</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="meizhuang">
			<li>美妆个护/宠物</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>美妆</dt>
						<dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd>
					</dl>
					<dl>
					<dt>美妆</dt>
						<dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd>
					</dl>
					<dl>
					<dt>美妆</dt>
						<dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd><dd>美妆</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="nvxie">
			<li>女鞋/箱包/钟表/珠宝</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>女鞋</dt>
						<dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd>
					</dl>
					<dl>
					<dt>女鞋</dt>
						<dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd>
					</dl>
					<dl>
					<dt>女鞋</dt>
						<dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd><dd>女鞋</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="nanxie">
			<li>男鞋/运动/户外</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>男鞋</dt>
						<dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd>
					</dl>
					<dl>
					<dt>男鞋</dt>
						<dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd>
					</dl>
					<dl>
					<dt>男鞋</dt>
						<dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd><dd>男鞋</dd>
					</dl>
						</div>
					</div>
					</div>
					</div>
					<div class="tongyong">
			<div id="qiche">
			<li>汽车/汽车用品</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>汽车</dt>
						<dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd>
					</dl>
					<dl>
					<dt>汽车</dt>
						<dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd>
					</dl>
					<dl>
					<dt>汽车</dt>
						<dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd><dd>汽车</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="muying">
			<li>母婴/玩具/乐器</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>母婴</dt>
						<dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd>
					</dl>
					<dl>
					<dt>母婴</dt>
						<dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd>
					</dl>
					<dl>
					<dt>母婴</dt>
						<dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd><dd>母婴</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="shiping">
			<li>食品/酒类/生鲜/特产</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>食品</dt>
						<dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd>
					</dl>
					<dl>
					<dt>食品</dt>
						<dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd>
					</dl>
					<dl>
					<dt>食品</dt>
						<dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd><dd>食品</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="liping">
			<li>礼品/鲜花/农资/绿植</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>礼品</dt>
						<dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd>
					</dl>
					<dl>
					<dt>礼品</dt>
						<dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd>
					</dl>
					<dl>
					<dt>礼品</dt>
						<dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd><dd>礼品</dd>
					</dl>
						</div>
					</div>
					</div>
					</div>
					<div class="tongyong">
			<div id="yiyao">
			<li>医药/保健/计生/情趣</li>
								<div class="li">
						<div class="li_alert">
																	<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
					<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
					<dl>
					<dt>手机</dt>
						<dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd><dd>手机</dd>
					</dl>
						</div>
					</div>
					</div>
					</div>
					<div class="tongyong">
			<div id="tushu">
			<li>图书/音像/电子书</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>图书</dt>
						<dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd>
					</dl>
					<dl>
					<dt>图书</dt>
						<dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd>
					</dl>
					<dl>
					<dt>图书</dt>
						<dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd><dd>图书</dd>
					</dl>
						</div>
					</div>
					</div>
					</div>
					<div class="tongyong">
			<div id="jipiao">
			<li>机票/酒店/旅游/生活</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>机票</dt>
						<dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd>
					</dl>
					<dl>
					<dt>机票</dt>
						<dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd>
					</dl>
					<dl>
					<dt>机票</dt>
						<dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd><dd>机票</dd>
					</dl>
						</div>
					</div>
			</div>
			</div>
			<div class="tongyong">
			<div id="licai">
			<li>理财/众筹/白条/保险</li>
								<div class="li">
						<div class="li_alert">
											<dl>
					<dt>理财</dt>
						<dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd>
					</dl>
					<dl>
					<dt>理财</dt>
						<dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd>
					</dl>
					<dl>
					<dt>理财</dt>
						<dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd><dd>理财</dd>
					</dl>
						</div>
					</div>
			</div>
				</div>
			</div>
			
			
		<!--滚动图-->
		
		<style>
		
		
		
 .carousel {
  float: left;
  width: 776px;
  height: 377px;
  overflow: hidden;
  background: #aaa;
  margin: 13px 0 0 0;
  position: relative;
  z-index: 4;
}
.carousel .prev_btn1 {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 250;
  width: 28px;
  cursor: pointer;
  height: 62px;
  background: rgba(56, 56, 56, 0.8);
  color: #fff;
  font-size: 32px;
  font-weight: bold;
  line-height: 62px;
  text-align: center;
  margin-top: 196px;
}
.carousel .next_btn1 {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 250;
  width: 28px;
  cursor: pointer;
  height: 62px;
  background: rgba(56, 56, 56, 0.8);
  color: #fff;
  font-size: 32px;
  font-weight: bold;
  line-height: 62px;
  text-align: center;
  margin-top: 196px;
}
 .carousel .carousel_imgs {
     margin-top: 0px;
 padding-left: 0;
  position: absolute;
  z-index: 5;
  width: 3650px;
  top: 0;
  left: 0;
}
.carousel .carousel_imgs li {
  float: left;
}
.carousel .carousel_imgs li img{
height: 378px;
width: 776px;
  float: left;
}
.carousel .carousel_idexs {
  position: absolute;
  z-index: 6;
  left: 302px;
  top: 320px;
}
.carousel .carousel_idexs li {
  float: left;
  margin-right: 8px;
  width: 14px;
  height: 14px;
  background: #3e3e3e;
  border-radius: 50%;
  color: #ffffff;
  font-weight: bold;
  line-height: 18px;
  text-align: center;
  cursor: pointer;
}


    #flash a{text-decoration: none;color: #fff;}
    #flash{width: 730px;height: 345px;margin: 100px auto;position: relative;cursor: pointer;}
    #pic li{position: absolute;top: 0;left: 0;z-index: 1;display: none;}
    #num{position: absolute;left: 40%;bottom: 10px;z-index: 2;cursor:default;}
    #num li{float: left;width: 20px;height: 20px;border-radius: 50%;background: #666;margin: 3px;line-height: 20px;text-align: center;color: #fff;cursor: pointer;}
    #num li.active{background: #f00;}
    .arrow{height: 60px;width: 30px;line-height: 60px;text-align: center;display: block;position: absolute;top:45%;z-index: 3;display: none;}
    .arrow:hover{background: rgba(0,0,0,0.7);}
    #flash:hover .arrow{display: block;}
    #left{left: 0%;}
    #right{right: -8%;}
		</style>
		<!--<div class="images">
            <div id="flash">
                <ul id="pic">
                    <li style="display:block"><img src="imgs/image-1.jpg" alt=""></li>
                    <li><img src="imgs/image-2.jpg" alt=""></li>
                    <li><img src="imgs/image-3.jpg" alt=""></li>
                    <li><img src="imgs/image-4.jpg" alt=""></li>
                    <li><img src="imgs/image-5.jpg" alt=""></li>
					<li><img src="imgs/image-5.jpg" alt=""></li>
                </ul>
    <ol id="num">
      <li class="active">1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
    </ol>
    <a href="javascript:;" class="arrow" id="left"><</a>
    <a href="javascript:;" class="arrow" id="right">></a> 
            </div>
			</div>-->
<div class="images" style="    margin: -604px 170px auto;">
			<div id="flash">
    <ul id="pic">
      <li style="display:block"><img src="imgs/image-1.jpg" alt=""></li>
                    <li><img src="imgs/image-2.jpg" alt=""></li>
                    <li><img src="imgs/image-3.jpg" alt=""></li>
                    <li><img src="imgs/image-4.jpg" alt=""></li>
                    <li><img src="imgs/image-5.jpg" alt=""></li>
					<li><img src="imgs/image-5.jpg" alt=""></li>
    </ul>
    <ol id="num">
      <li class="active">1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
    </ol>
    <a href="javascript:;" class="arrow" id="left"><</a>
    <a href="javascript:;" class="arrow" id="right">></a> 
  </div></div>		

			<div class="imgs-bottom" style="margin-top: -148px;
    margin-left: 204px;">
				<img src="imgs/image-bottom-1.jpg">
				<img src="imgs/image-bottom-2.jpg">
			</div>
	</div>

		
		<!--nav右-->
		<div class="nav_right">
			<div class="user_info">
				<div class="user_info_avatar"><img src="imgs/no_login.jpg"></div>
				<p>Hi,欢迎来到京东！</p>
				<p>
					<a href="login.html">登录</a>
					<a href="register.html">注册</a>
				</p>
			</div>
			<div class="user">
				<a href="" class="xinren">新人福利</a><a href="#" class="xinren">PLUS会员</a>
			</div>
			<div class="message">
					<div class="cuxiao">
						<a href="">促销</a>|<a href="">公告</a><span></span><a href="">更多</a>
					</div>
					<li><a href="">居家好物节满799减400</a></li>
					<li><a href="">每日享折扣 京东品质游</a></li>
					<li><a href="">奶粉2段 首购5折</a></li>
					<li><a href="">泉来净水节 免单抽奖享不停</a></li>
			</div>
    <div id="service">
            <li class="service_item">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">话费</span>
                </a>
            </li>
			<li class="service_item">
                <a href="" class="service_lk" >
					<i class="">图</i><br>
                    <span class="service_txt">机票</span>
                </a>
            </li>
			<li class="service_item">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">酒店</span>
                </a>
            </li>
			<li class="service_item">
                <a href="" class="service_lk" >
					<i class="">图</i><br>
                    <span class="service_txt">游戏</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">企业购</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">加油卡</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">电影票</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">火车票</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">众筹</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">理财</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk" >
					<i class="">图</i><br>
                    <span class="service_txt">礼品卡</span>
                </a>
            </li>
			<li class="service_item ">
                <a href="" class="service_lk">
					<i class="">图</i><br>
                    <span class="service_txt">白条</span>
                </a>
            </li>
    </div>
		
		</div>
		<div class="miaosha">
			<img src="imgs/miaosha.png" class="miaosha_top">
			<div class="miaosha_box">
			<div class="miao_box_1">
			<img src="imgs/miaosha-1.jpg" class="miao">
			<p>先锋（Singfun） 取暖器/家用电暖器/电暖气/11片电热油汀 DS6111</p>
			<p>¥<span>239.00</span>¥<<s>369.00</s></p></div>
<div class="miao_box_1">
			<img src="imgs/miaosha-2.jpg" class="miao">
			<p>展卉 应季鲜冬枣甜脆枣 1kg 单果约12-16g（大果） 新鲜水果</p>
			<p>¥<span>13.90</span>¥<s>89.00</s></p></div>
<div class="miao_box_1">
			<img src="imgs/miaosha-3.jpg" class="miao">
			<p>Apple MacBook Pro 13.3英寸笔记本电脑 深空灰色（2017新款</p>
			<p>¥<span>14266.00</span>¥<s>14288.00</s></p></div>
<div class="miao_box_1">
			<img src="imgs/miaosha-4.jpg" class="miao">
			<p>小米（MI）小米盒子3S 智能网络电视机顶盒 4K电视 H.265硬解</p>
				<p>¥<span>299.00</span>¥<s>339.00</s></p></div>
<div class="miao_box_1">
			<img src="imgs/miaosha-5.jpg" class="miao">
			<p>光明 莫斯利安 常温酸牛奶（原味）200g*24量贩装</p>
			<p>¥<span>85.90</span>¥<s>109.90</s></p>
			</div>
<style>
 


</style>
    <div id="images-ad">  
        <img id="image1" src="imgs/miaosha-ad1.jpg" />  
    </div>  
 
			
			
			</div>
		</div>
	</main>
	
	
	<!--底部-->
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
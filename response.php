<?php 
	include 'lib/phplib/Mysql.php';
	include 'lib/phplib/lib.php';
	include 'lib/phplib/emoji.php';
	$lid =quotes(safe_replace($_GET['id']));
	$mysql =new Mysql();
	$sql="select * from lovecontent where id=".$lid;
	$v = $mysql->getRow($sql);
	if (empty($v)) {
		Header("Location: index.php"); exit;
	}
	$sql2 = "select * from comments where lid=".$lid;
	$data = $mysql->getAll($sql2);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>中南大学表白墙</title>
<link href="lib/bootstrap.min.css" rel="stylesheet">
<link href="lib/lovewall.css" rel="stylesheet">
<link href="lib/emoji.css" rel="stylesheet">
</head>
<body class="bg-warning">
	<div class="container">
		<div class="nav navbar-inverse navbar-fixed-bottom text-center upanddown" id="header" style="background-color:RGB(238,238,238);">
    		<form style="" action="res.php" method="post">
    			
				    <div class="input-group">
				      <input type="text" class="form-control" name="content" placeholder="我也说一句..." id="response">
				      <input type="hidden" name="lid" value="<?=$lid?>">
				      <span class="input-group-btn">
				        <button class="btn btn-info " type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发送&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
				      </span>
				    </div>
			
    			
    		</form>
    	</div>
    	<div class="nav navbar-inverse navbar-fixed-top text-center upanddown"  style="background-color:pink;">

    		<h3 class="font-weight" style="color: white;"><span class="glyphicon glyphicon-heart xin"><span class="glyphicon glyphicon-heart-empty xin"></span><span class="glyphicon glyphicon-heart xin"></span></span>中南大学表白墙<span class="glyphicon glyphicon-heart xin"></span><span class="glyphicon glyphicon-heart-empty xin"></span><span class="glyphicon glyphicon-heart xin"></span></h3>
    	</div>
    	<div class="jumbotron shua yy" style="padding-top: 100px;">
    		<div class="text-right inline">
    			<a href="index.php"><button class="btn btn-info btn-block"><span class="glyphicon glyphicon-refresh"></span>刷墙~刷墙~疯狂刷~~</button></a>	
    		</div>
    	</div>
    	<div class="jumbotron  neirong yy" >
    		<div class="media">
			  <div class="media-left media-top" id="tupian">
			    <a href="#">
			      <img class="media-object img-circle" src="image/<?=$v['image']?>">
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading"><span class="caret"></span>来自CSU的第<?=$v['id']?>封表白信 <span class="glyphicon glyphicon-paperclip"></span></h4>
			    <h5><?=$v['name']?></h5>		    
			    <h6><?=dealtime($v['time'])?></h6>
			    <?=$v['content'] ?>
			  </div>
			  <div class="text-right"><button class="btn btn-primary" onclick="huifu();">回复</button></div>
			</div>
    	</div>
    	<?php 
    	if (!empty($data)) {
    		$lou=1;
    
    	foreach($data as $value) {?>
		<div class="well well yy neirong">
			<h4><?php echo $lou;$lou++;?>楼：</h4>
			<h6><?=dealtime($value['time'])?></h6>
			<h5><?=$value['content']?></h5> 
		</div>
		<?php 	} }?>

    	<div class="jumbotron yy shua">
		<p class="text-center">错过了就不必再寻找，总会有新表白的出现！</p>    			
    		<div class="text-right inline">
    			<a href="index.php?id=<?=$lid?>"><button class="btn btn-info btn-block"><span class="glyphicon glyphicon-refresh"></span>点击刷新本页</button></a>	
    		</div>
    		<hr>
    		<div class="text-center">
    			<button class="btn btn-default btn-sm " data-toggle="modal" data-target="#xmm">一个不为人知的小秘密</button>
    		</div>
    	</div>
    	<div class="jumbotron yy" style="margin-bottom: 80px;">
    		<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#gyqq">关于墙墙</button>
    		<hr>
    		<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#gywm"">关于我们</button>
    	</div>
        <!-- 模态框1 -->
        <div role="dialog" class="modal fade bs-example-modal-sm" id="gyqq">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span>&times</span></button>
						<h4 class="modal-title text-center" style="color: pink;"><span class="glyphicon glyphicon-heart xin">欢迎来到中南大学表白墙<span class="glyphicon glyphicon-heart xin"></span></span></h4>	
					</div>
					<div class="modal-body ">
					<ul class="text-info">
						<li>本墙为大家提供了一个平台～～～嘿嘿嘿～～你懂得！没脱单的快行动喽！闲时刷qq微博...有空也可以刷刷墙～～</li>
						<li>前20条表白当然是表白我们的CSU啦~~~截取自来自各地csuers的表白信，接下来，就看你们的表演啦~</li>
						<li>有些话，当不应该和谁讲的时候，来找我，本墙会从始至终的倾听你~~</li>
						<li>本墙纯纯纯匿名！！！你发过来本墙也母鸡你到底是个帅锅活着美女！更不用说你自己啦～～业界良心.....纯匿名走起！high起来！大声表白啊～～</li>
						<li>因为纯匿名引发的问题也想了想，喷子啦....水军啦....你们懂！不过我相信我们CSUERS的素质，好的环境需要大家共同维护...低素质的...大家合力刷走！滴～当然本站也有管理员....可以删你的表白，小伙子小菇凉们发表的时候注意啦～～</li>
						<li>本墙怕加载全部后你们的小电视会炸了！boomboom！so～每次只显示最新的20条表白！（可以节省大家的一点流量嘛....有待改进..有更好的方法提出来）要看以前的...怎么办！墙上有个小秘密～～你们自己去发掘喽！我就不多说啦～～嘿嘿嘿！！（一定牢记呦！）</li>
						<li>求截头像！到底截不截呢？嘿嘿嘿我偏不！！所有头像全部随机！当然你们有好看的头像不妨发给我！</li>
						<li>当然，本墙也会定期挑选一些精品表白...会挂在本墙脑袋上滴！！大佬们加油喽！！</li>
						<li>至于为何纯匿名，详情见关于我们!</li>
						<li>纯匿名了嘛，当然他的点赞就失去了意义，就没有加入点赞功能</li>
						<li>本墙其实很好记的拼音英语混搭2333 jinggege.me/csulovewall（域名定死了，我也很绝望我能怎么办，csulovewall你们有更好的记住的词，欢迎联系我们）记不住可以记一个靖哥哥（jinggege.me）这个不保证一直能用@_@</li>
						<li>OK，本墙发言结束就不BB那么多了，下面～～开始你的表演～～</li>
					</ul>
						<button class="btn btn-primary btn-sm btn-block" data-dismiss="modal">别BB啦，我要开始表演了</button>
					</div>
				</div>
			</div>
        </div>
        <!-- 模态框2 -->
        <div role="dialog" class="modal fade bs-example-modal-sm" id="gywm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span>&times</span></button>
						<h3 class="modal-title text-center">关于我们</h3>
						
					</div>
					<div class="modal-body">
					<ul class="text-info">
						<li>2333先来解决一下上一个遗留问题，为啥要匿名呢？首先，我看表白墙上大多数都要截头像....目的就是匿名呗...so..我帮你实现这个愿望....昵称不填默认CSU匿名爱恋者..其次....假设不匿名，不匿名你就得登录....登录一种就先得注册...不然就是第三方登录（QQ登录等）...注册，你会为一个不知名的网站注册自己信息么？答案当然是NO，（当然我也有点懒）如果你要和我较真....如果需求高的话...我也会开发滴...还有就是第三方登录....这个如果qq登录在qq里打开还好....他会自动登录....如果在手机自带浏览器打开..还要输入qq和密码...卧槽好麻烦什么鬼...果断关闭（腾讯爸爸不给我一键登录的借口啊）我也很绝望，因此你懒的输密码....当然我也懒...OK一拍即合....GG斯密达..大家全部匿名，就这样诞生了。</li>
						<li>关于我们团队...这个表白墙只是个开胃菜....大招在后面..嘿嘿嘿....后面会继续推出新的成品，内容更加丰富，欢迎大家关注！</li>
						<li>关于联系我们的方式.！你也可以发到csulovewall@163.com（比较懒，就用163了）什么意见呀吐槽呀随便发吧...我们会尽量回复你的！</li>
						<li>可能这个UI界面有点low...毕竟不是美工...脑袋瓜子里没有一丢丢的艺术细胞...如果有更好的..可以联系我们...加以改进喽</li>
						<li>看了这么多了...估计有点累了...来给你讲故事听吧！怎么这个表白墙就诞生了呢？看到各个高校的表白墙都是QQ微博啦...每次所能加的人比较有限...qq有加人上限嘛...咱们csu又比较大...人多...就想到来做一个平台！APP呢还是网页呢？你会为了这么一个东东来下一个app装手机里？当然NO（终究原因我也比较懒）...所以这个想法就诞生了....继而这个墙就诞生了！</li>
					</ul>
						<button class="btn btn-primary btn-sm btn-block" data-dismiss="modal">OK我明白啦</button>
					</div>
				</div>
			</div>
        </div>
        <!-- 模态框3 -->
        <div role="dialog" class="modal fade bs-example-modal-sm" id="xmm">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal"><span>&times</span></button>
						<h3 class="modal-title text-center">嘘~~~告诉你一个小秘密</h3>
						
					</div>
					<div class="modal-body text-right">
						<div class="input-group input-group-lg">
						  <span class="input-group-addon" id="sizing-addon1">我想要看第</span>
						  <input type="text" class="form-control" placeholder="520" aria-describedby="sizing-addon1" id="chaxun">
						  <span class="input-group-addon" id="sizing-addon1">封情书</span>
						</div>
						<hr>
						<button class="btn btn-primary btn-sm btn-block" data-dismiss="modal" id="kan" onclick="search();">OK我要看</button>
					</div>
				</div>
			</div>
        </div>
	</div>
    	

</body>
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/bootstrap.js"></script>
<script type="text/javascript">
		$('.neirong').hide();
		$('#biaodan').hide();
		$('#header').hide();
	window.onload=function () {

		$('#biaodan').fadeIn(2000);
		$('.neirong').fadeIn(3500);
		$('.upanddown').fadeTo("slow",0.9);
}
	function a() {
		$('.xin').fadeToggle(3000);
		$('.shua').fadeToggle(5000);
	}
	window.setInterval(a, 3000); 
	window.setInterval(function () {
		$('.neixin').fadeToggle(1000);
	},1000);
	function huifu() {
		$('#response').focus();
	}
		function search() {
		var id=$('#chaxun').val();
		window.open('index.php?id='+id);
	}
</script>
</html>
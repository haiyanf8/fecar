<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">

        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
        <link rel="stylesheet" href="/www/Public/dev/css/pbl.css">
        <link rel="stylesheet" href="/www/Public/dev/css/index.css">
    </head>
    <body>
 
        <div class="banner">
	<div class="banner-header">
		<h1 class="logo">
		    <a href="./">
		        <img src="/www/Public/dev/img/source/pbl/head-logo.png"  alt="迈迈车官方网站-专业检测评估卖车平台,迈迈车LOGO" />
		    </a>
		</h1>

		<div class="local">
			<div class="local-bg"></div>
		    <div class="local-area">
		        <i class="local-img"></i>
		        <p class="local-txt">
		            <span class="js-hd-city"><?php echo session('opencity');?></span>
		        </p>
		    </div>
			
			<div class="local-box">
				<div class="local-box-arrow"></div>
			    <ul class="local-box-citys">
			    	<?php if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li>
	        			<?php else: ?>
	        				<li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			    </ul>
		    </div>
		</div>

		<div class="nav">
			<div class="nav-bg"></div>
				<div class="nav-item">
				    <a href="./" class="item current">首页</a>
				    <a href="./sale.html" class="item">卖车</a>
				    <a href="./valuate-index.html" class="item">估价</a>
				    <a href="./history.html" class="item">竞拍历史</a>
				    <a href="./store-index.html" class="item">服务网点</a>
			    </div>
		    </div>

		    <div class="tel">
		    	<span class="shake"></span>400-9907-999
		    </div>
	</div>
	
	<div class="banner-box js-quicksale-reference">
		<div class="m-bsale">
			<div class="m-bsale-form">
				<input type="text" class="phone js-bannersale-tel" placeholder="请输入车主手机号" autocompelete="off" maxlength=11>
				<button class="salebtn js-bannersale-btn">我要卖车</button>
			</div>

			<div class="m-bsale-alert js-banner-wrong-box">
				<i class="i-mark">!</i>
				<span class="ct js-banner-confirm-ct"></span>
			</div>
		</div>

	</div>
	
	<div class="banner-order">
		今日已经有<em><?php echo ($appointCount); ?></em>人预约卖车
	</div>
</div>


        <div class="deal">

	<div class="deal-txt">
		<h2>
			<p class="tten">LATEST DEALS</p>
			<p class="ttcn">最新成交</p>
		</h2>
		<span class="more"><a href="./history.html" target="_blank">更多&gt;&gt;</a></span>
	</div>

	<div class="deal-box">
		
	    <div class="deal-box-btn js-choosen">
	        <ul>
	            <li class="current item"></li>
	            <li class="item"></li>
	            <li class="item"></li>
	            <li class="item"></li>
	            <li class="item"></li>
	        </ul>
	    </div>
		
		<div class="deal-box-wrap">
		    <div class="deal-box-content js-target">
		    	<ul>
					<?php if(is_array($bidedData)): $i = 0; $__LIST__ = $bidedData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item deal-box-item">
							<div class="img">
								<a href="./history-detail/<?php echo ($vo['carid']); ?>.html">
									<img src="/www/Public/dev/img/source/pbl/history-detail-default.jpg" data-origin="<?php echo C('CHECK_URL'); echo ($vo['url']); ?>" >
								</a>
							</div>
	                    	<div class="info">
	                    		<h3><a href="./history-detail/<?php echo ($vo['carid']); ?>.html"><?php echo ($vo['info']); ?></a></h3>
		                        <p><span><?php echo (date('Y-m',$vo['regist_date'])); ?></span>上牌</p>
		                        <p>行驶里程<span><?php echo round($vo['kilometers']/10000,2);?></span>万公里</p>
	                    	</div>
	                    	<div class="audition"><?php echo ($vo['bid_times']); ?>人竞拍</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
		    	</ul>
		    </div>
	    </div>
	</div>
</div>


        <div class="compare js-compare-target">
    <div class="compare-center">
        <div class="item num01" id="js-num01">3000</div>
        <div class="item num02"><span id="js-num02">20</span>%</div>
        <div class="item num03">0</div>
    </div>
</div>


        <div class="news">
	<div class="news-title">
		<h2>
			<p class="tten">LATEST NEWS</p>
			<p class="ttcn">最新资讯</p>
		</h2>
		<span class="more"><a href="./article.html">更多&gt;&gt;</a></span>
	</div>

	<div class="news-content">
		<ul>
			<li class="item">
				<div class="img">
					<a href="./article-detail/<?php echo ($leftArticle['articleid']); ?>.html">
						<img src="<?php echo ($leftArticle['prepic']); ?>" class="img">
					</a>
				</div>
				<h3 class="tt">
					<a href="./article-detail/<?php echo ($leftArticle['articleid']); ?>.html"><?php echo ($leftArticle['title']); ?></a>
				</h3>
				<p class="ct">
					<?php echo ($leftArticle['abstract']); ?>
				</p>
				<p class="more">
					<a href="./article-detail/<?php echo ($leftArticle['articleid']); ?>.html">详情</a>
				</p>
				
			</li>

			<li class="item twopadding">
				<h3 class="tt">
					<a href="./article-detail/<?php echo ($middleArticle['articleid']); ?>.html"><?php echo ($middleArticle['title']); ?></a>
				</h3>
				<p class="ct">
					<?php echo ($middleArticle['abstract']); ?>
				</p>
				<p class="more">
					<a href="./article-detail/<?php echo ($middleArticle['articleid']); ?>.html">详情</a>
				</p>

				<div class="img">
					<a href="./article-detail/<?php echo ($middleArticle['articleid']); ?>.html"><img src="<?php echo ($middleArticle['prepic']); ?>"></a>
				</div>
			</li>

			<li class="item nomargin">
				<div class="img">
					<a href="./article-detail/<?php echo ($rightArticle['articleid']); ?>.html">
						<img src="<?php echo ($rightArticle['prepic']); ?>">
					</a>
				</div>
				
				<h3 class="tt">
					<a href="./article-detail/<?php echo ($rightArticle['articleid']); ?>.html"><?php echo ($rightArticle['title']); ?>
					</a>
				</h3>

				<p class="ct">
					<?php echo ($rightArticle['abstract']); ?>
				</p>

				<p class="more">
					<a href="./article-detail/<?php echo ($rightArticle['articleid']); ?>.html">详情</a>
				</p>
			</li>
		</ul>
	</div>
</div>


        <div class="ourservice js-ourservice">
    <div class="ourservice-title">
        <h2>
            <p class="tten">OUR SERVICE</p>
            <p class="ttcn">我们的服务</p>
        </h2>
    </div>

    <div class="ourservice-content js-ourservice-content">
       <ul>
           <li class="item">
                <div class="img">
                    <i class="sale"></i>
                </div>
                <h3 class="tt">高效卖车 足不出户</h3>
                <p class="ct">1天结拍, 当天完成交易</p>
                <p class="ct">为您节省不必要的比价时间</p>
            </li>

            <li class="item">
                <div class="img">
                    <i class="contrast"></i>
                </div>
                <h3 class="tt">价比千家 省时省心</h3>
                <p class="ct">超过3000专业买家在线</p>
                <p class="ct">实时出价竞拍, 不赚差价</p>
            </li>

            <li class="item">
                <div class="img">
                    <i class="safe"></i>
                </div>
                <h3 class="tt">安全保障 急速打款</h3>
                <p class="ct">通过诚信体系保障资金安全</p>
                <p class="ct">签约后极速打款，实时到账</p>
            </li>

            <li class="item">
                <div class="img">
                    <i class="free"></i>
                </div>
                <h3 class="tt">全程免费 优质服务</h3>
                <p class="ct">代办所有手续, 全程0费用</p>
                <p class="ct">让您享受一站式贴心服务</p>
            </li>
       </ul>
    </div>
</div>


        

<div class="pbl-aside-nav aside-nav">
	<ul>
		<li class="msg js-service-icon">
			<i class="i msg-icon"></i>
			<div class="msg-box js-service-content">
				<div class="title js-service-head">
					<label>小<em>迈</em>在线</label>
					<span><img src="/www/Public/dev/img/pbl/aside-nav-service-close.png"></span>
				</div>
				<div class="service js-service-chatwindow" id="J_lightDemoWrapMain">
				</div>
			</div>
		</li>

		<li class="tel">
			<i class="i tel-icon"></i>
			<div class="tel-box">
				<div class="flow">
					<div class="img">
						<img src="/www/Public/dev/img/pbl/aside-nav-tel-phone.png" />
					</div>
					<div class="info">
						<p class="title">预约卖车热线</p>
						<p class="te2lnum">400-9907-999</p>
					</div>
				</div>
			</div>
		</li>

		<li class="wx">
			<i class="i wx-icon"></i>
			<div class="wx-ewmbox">
				<div class="wx-ewm">
					<p>关注微信</p>
					<img src="/www/Public/dev/img/source/pbl/qr--wechat.jpg">
					<p>扫一扫关注微信</p>
				</div>
			</div>
		</li>

		<li class="app">
			<i class="i app-icon"></i>
			<div class="app-ewmbox">
				<div class="app-ewm">
					<p>下载APP</p>
					<img src="/www/Public/dev/img/source/pbl/qr--download.png">
					<p>扫一扫下载APP</p>
				</div>
			</div>
		</li>

		<!-- <li class="goto js-aside-nav-goto_top">
			<i class="i goto-icon"></i>
		</li> -->
	</ul>
</div>

        
        <div class="footer">
    <div class="footcenter">
        <div class="footer-con">
            <div class="footer-left">
                <img class="logoimg" src="/www/Public/dev/img/source/pbl/logo.png" alt="迈迈车官方网站-专业检测评估卖车平台,迈迈车LOGO" />
                <div class="txt"><i class="tel"></i>400-9907-999</div>
                <div class="txt wxfont"><i class="wx"></i>关注微信
                    <div class="footer-left-wechat ewm">
                        <div class="img">
                            <img class="js-ft-wechat" src="/www/Public/dev/img/source/pbl/qr--wechat.jpg">
                        </div>
                        <div class="info">
                            <p>微信官方公众号</p>
                            <p>扫一扫添加关注</p>
                        </div>

                        <div class="arrow"></div>
                    </div>
                </div>
            </div>

            <div class="footer-right">
                <dl class="footer-dl footer-txt">
                    <dd class="footer-tt">关于我们</dd>
                    <?php if($level == 'top'): ?><dd class="item-txt"><a href="./intro.html" target="_blank">&gt;公司简介</a></dd>
                        <dd class="item-txt"><a href="./business.html" target="_blank">&gt;商务合作</a></dd>
                    <?php else: ?>
                        <dd class="item-txt"><a href="../intro.html" target="_blank">&gt;公司简介</a></dd>
                        <dd class="item-txt"><a href="../business.html" target="_blank">&gt;商务合作</a></dd><?php endif; ?>
                </dl>

                <dl class="footer-dl footer-txt">
                    <dd class="footer-tt">卖车指南</dd>
                    <?php if($level == 'top'): ?><dd class="item-txt" ><a href="./process.html" target="_blank">&gt;卖车流程</a></dd>
                        <dd class="item-txt"><a href="./introduction.html" target="_blank">&gt;卖车须知</a></dd>
                    <?php else: ?>
                        <dd class="item-txt" ><a href="../process.html" target="_blank">&gt;卖车流程</a></dd>
                        <dd class="item-txt"><a href="../introduction.html" target="_blank">&gt;卖车须知</a></dd><?php endif; ?>
                </dl>

                <dl class="footer-dl footer-txt">
                    <dd class="footer-tt">新闻中心</dd>
                    <?php if($level == 'top'): ?><dd class="item-txt"><a href="./article-cate/1.html" target="_blank">&gt;行业动态</a></dd>
                        <dd class="item-txt"><a href="./article-cate/2.html" target="_blank">&gt;卖车问答</a></dd>
                        <dd class="item-txt"><a href="./article-cate/3.html" target="_blank">&gt;汽车知识</a></dd>
                        <dd class="item-txt"><a href="./article-cate/4.html" target="_blank">&gt;新闻资讯</a></dd>
                    <?php else: ?>
                        <dd class="item-txt"><a href="../article-cate/1.html" target="_blank">&gt;行业动态</a></dd>
                        <dd class="item-txt"><a href="../article-cate/2.html" target="_blank">&gt;卖车问答</a></dd>
                        <dd class="item-txt"><a href="../article-cate/3.html" target="_blank">&gt;汽车知识</a></dd>
                        <dd class="item-txt"><a href="../article-cate/4.html" target="_blank">&gt;新闻资讯</a></dd><?php endif; ?>
                </dl>

                 <dl class="footer-dl footer-txt footer-addresss">
                    <dd class="footer-tt">公司地址</dd>
                    <dd class="item-txt">
                        <i class="area"></i>
                        上海市长宁区天山路600弄思创大厦4号楼7层
                    </dd>
					<!-- <dd class="item-txt">
						<i class="area"></i>
						福州市晋安区福新东路370号中海联汽车创意园
					</dd> -->
                </dl>
            </div>
        </div>
    </div>

    <div class="footer-link">
        <span class="tt">友情链接:</span>
        <span class="ct">
            <?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['site']); ?>" target="_blank"><?php echo ($vo['sitename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
    </div>

</div>
<div class="footer-record">
     <p class="record-txt">
     	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1258281401'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1258281401%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        Copyright© 2016 fecar.com All Right Reserved | 闽ICP备14020087号-1
     </p>
</div>


        
<div class="pbl-msg-alert js-pbl-msg-alert">
    <div class="wrap--content content--success">
    	<div class="title js-title"></div>
        <div class="content js-content"></div>
        <div class="btn--yes js-btn--no">确定</div>
        <div class="close js-close"></div>
    </div>
</div>


        <div class="pbl-success-alert js-success-alert">
    <div class="wrap--success">
      <div class="title js-title">信息提交成功</div>
        <div class="content js-content">
            <p>我们会第一时间联系您</p>
            <p>如需了解更多详情请关注微信号。</p>
            <img src="/www/Public/dev/img/source/pbl/qr--wechat.jpg">
        </div>
        <div class="btn--yes js-btn--no">确定</div>
        <div class="close js-close"></div>
    </div>
</div>


        

<div class="quicksale js-quicksale active">

	<!-- <div class="quicksale-up js-quicksale-up">
		<img src="/www/Public/dev/img/pbl/quick-up-people.png">
	</div> -->

	<div class="quicksale-pop js-quicksale-pop">

		<div class="quicksale-pop-yl"></div>

		<div class="quicksale-pop-wrap">
			<div class="people">
				<img src="/www/Public/dev/img/pbl/quick-pop-people.png">
			</div>
			<div class="form">
				
				<input type="text" class="tel js-quicksale-tel" placeholder="请输入车主手机号" autocompelete="off" maxlength=11>

				<div class="form-ipt js-ipt-info">
					<span class="error js-quicksale-error"><img src="/www/Public/dev/img/pbl/quicksale-error.png"></span>
				</div>

				<button class="salebtn js-quicksale-salebtn">我要卖车</button>
			</div>
			
			<div class="form-intro">
				<p class="pic"><img src="/www/Public/dev/img/pbl/quicksale-logo.png"></p>
				<p class="txt">让卖车更透明</p>
			</div>

		</div>
		
		<div class="quicksale-pop-close js-quicksale-close">
			<img src="/www/Public/dev/img/pbl/asidesale-close.png">
		</div>
	</div>
</div>


		
<div class="js-be-api m-be" >
	{
		"quickSale" : "<?php echo U('appoint/insert');?>",
		"faq" : "<?php echo U('consult/insert');?>",
		"getBrand" : "<?php echo U('car/brand');?>",
		"getSeries" : "<?php echo U('car/series');?>",
		"getModel" : "<?php echo U('car/model');?>",
        "getValuateCount": "<?php echo U('valuate/count');?>",
        "valuateAppoint": "<?php echo U('valuate/innerAppoint');?>",
        "getStoreCoord" : "<?php echo U('store/coord');?>",
        "getStoreInfo" : "<?php echo U('store/info');?>"
	}
</div>


        <script src="/www/Public/dev/lib/js/jquery-1.11.3.min.js" charset="utf-8"></script>

        <script src="/www/Public/dev/js/pbl.js" charset="utf-8"></script>

        <script src="/www/Public/dev/js/index.js" charset="utf-8"></script>

        <script src="/www/Public/dev/js/numCountUp.min.js" charset="utf-8"></script>

        <!-- IE8及以下支持JSON -->
        <!--[if lt IE 9]>
            <script src="https://g.alicdn.com/aliww/ww/json/json.js" charset="utf-8"></script>
        <![endif]-->
        <!-- 自动适配移动端与pc端 -->
        <script src="https://g.alicdn.com/aliww/??h5.imsdk/2.1.0/scripts/yw/wsdk.js,h5.openim.kit/0.3.7/scripts/kit.js" charset="utf-8"></script>

        
<script>
    var _hmt = _hmt || [];
    $(function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?99e243f83b4397c489bac65ecc7f9aa8";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    });
</script>
<script>
$(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
});
</script>

    </body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="renderer" content="webkit">
        <link rel="stylesheet" href="/www/Public/dev/css/pbl.css">
        <link rel="stylesheet" href="/www/Public/dev/css/article-detail.css">
    </head>
    <body>

        <div class="wrapper">
    <div class="header">
        <h1 class="logo">
            <?php if($level == 'top'): ?><a href="./">
            <?php else: ?>
                <a href="../"><?php endif; ?>
                <img src="/www/Public/dev/img/source/pbl/logo.png" />
            </a>
        </h1>

        <div class="local">
            <div class="local-area">
                <i class="local-img"></i>
                <p class="local-txt">
                    <span class="js-hd-city"><?php echo session('opencity');?></span>
                </p>
            </div>
            
            <div class="local-box">
                <div class="local-box-arrow"></div>
                <ul class="local-box-citys">
                	<?php if($param['page']): if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li>
                            <?php else: ?>
                                <li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                	<?php elseif($action_name == 'valuate' ): ?>
                		<?php if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li>
                            <?php else: ?>
                                <li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                	<?php else: ?>
                		<?php if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li>
                            <?php else: ?>
                                <li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </div>

        <div class="nav">
            <div class="nav-item">
                <?php if($level == 'top'): ?><a href="./" class="item">首页</a>
                    <a href="./sale.html" class="item <?php echo ($action_name=='sale'? 'current':''); ?>">卖车</a>
                    <a href="./valuate-index.html" class="item <?php echo ($action_name=='valuate'? 'current':''); ?>">估价</a>
                    <a href="./history.html" class="item <?php echo ($action_name=='history'? 'current':''); ?>">竞拍历史</a>
                    <a href="./store-index.html" class="item <?php echo ($action_name=='store'? 'current':''); ?>">服务网点</a>
                <?php else: ?>
                    <a href="../" class="item">首页</a>
                    <a href="../sale.html" class="item <?php echo ($action_name=='sale'? 'current':''); ?>">卖车</a>
                    <a href="../valuate.html" class="item <?php echo ($action_name=='valuate'? 'current':''); ?>">估价</a>
                    <a href="../history.html" class="item <?php echo ($action_name=='history'? 'current':''); ?>">竞拍历史</a>
                    <a href="../store-index.html" class="item <?php echo ($action_name=='store'? 'current':''); ?>">服务网点</a><?php endif; ?>
            </div>
        </div>

        <div class="tel">
         400-9907-999
        </div>
    </div>
</div>


        <div class="main_container content">

            <div class="left">

                
<div class="bread-nav">
	<a class="idx" href="../">首页</a>
	<span>></span>
	<a href="../article.html">新闻中心</a>
	<span>></span>
    <a href="../article-cate/<?php echo ($cate[0]['cateid']); ?>.html"><?php echo ($cate[0]['category']); ?></a>
    <span>></span>
	<a href="#">正文</a>
</div>

 <div class="article-detail">
    <h1 class="title"><?php echo ($_article[0]['title']); ?></h1>
    <div class="article-detail-info">
    	<span class="time">发表于:<em><?php echo ($_article[0]['smp_date']); ?></em></span>
        <span class="read">阅读:<em><?php echo ($_article[0]['pageview']); ?></em></span>
        <span class="author">作者:<em><?php echo ($_article[0]['author']); ?></em></span>
    </div>

    <div class="article-detail-des">
        <em>摘要：</em><?php echo ($_article[0]['abstract']); ?>

    </div>

    <div class="article-detail-cont">

         <?php echo ($_article[0]['article']); ?>

    </div>

    <div class="article-detail-relative">

        <div class="relativeArticle"><em>推荐阅读：</em>
            <ul>
                <?php if(is_array($_recomm)): $i = 0; $__LIST__ = $_recomm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($vo['title']); ?>" href="../article-detail/<?php echo ($vo['articleid']); ?>.html"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
      </div>
    </div>
</div>


            </div>

            <div class="right">

                <div class="aside-order">
  <h2>今日已<em><?php echo ($appointCount); ?></em>人预约卖车</h2>
  <div class="aside-order-tel">
    <input type="text" class="phone js-historysale-tel" placeholder="请输入车主手机号" autocompelte="off" maxLength=11>
    <button class="salebtn js-historysale-btn">我要卖车</button>
  </div>
</div>


                <div class="aside-hotsale">
    <h2>本周热门竞拍</h2>
    <div class="aside-hotsale-list">
        <ul>
            <?php if(is_array($hotSellData)): $i = 0; $__LIST__ = $hotSellData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item">
                    <h3 class="ct">
                    <?php if($level == 'top'): ?><a href="./history-detail/<?php echo ($vo['carid']); ?>.html">
                    <?php else: ?>
                        <a href="../history-detail/<?php echo ($vo['carid']); ?>.html"><?php endif; ?>
                        <?php echo ($vo['info']); ?>
                    </a>
                    </h3>
                    <div class="info">
                        <div class="txt">
                            <p><span><?php echo (date('Y-m',$vo['regist_date'])); ?></span>上牌</p>
                            <p>里程<span><?php echo round($vo['kilometers']/10000,2);?></span>万公里</p>
                        </div>
                        <div class="auction"><?php echo ($vo['bid_times']); ?>人竞拍</div>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>


                <div class="aside-ad">
    <img src="/www/Public/dev/img/article/aside-ad.jpg" alt="">
</div>


            </div>
        </div>


        <div class="footer">
    <div class="footcenter">
        <div class="footer-con">
            <div class="footer-left">
                <img class="img" src="/www/Public/dev/img/source/pbl/logo.png" alt="" />
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
					<dd class="item-txt">
						<i class="area"></i>
						福州市晋安区福新东路370号中海联汽车创意园
					</dd>
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

        
        <script src="/www/Public/dev/lib/js/jquery-1.11.3.min.js" charset="utf-8"></script>
        <script src="/www/Public/dev/js/pbl.js" charset="utf-8"></script>
		<script src="/www/Public/dev/js/article-detail.js" charset="utf-8"></script>
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
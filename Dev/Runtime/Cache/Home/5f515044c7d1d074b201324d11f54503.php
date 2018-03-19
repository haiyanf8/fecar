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
        <link rel="stylesheet" href="/www/Public/dev/css/sale.css">
    </head>
    <body>
    
        <div class="wrapper">
    <div class="header">
        <h1 class="logo">
            <?php if($level == 'top'): ?><a href="./">
            <?php else: ?>
                <a href="../"><?php endif; ?>
                <img src="/www/Public/dev/img/source/pbl/other-logo.png" />
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
                	<?php if($param['page']): if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); echo ($param['page']); ?>"><?php echo ($vo["city"]); ?></a></li>
                            <?php else: ?>
                                <li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); echo ($param['page']); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                	<?php elseif($action_name == 'valuate' ): ?>
                		<?php if(is_array($hotcity)): $i = 0; $__LIST__ = $hotcity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["current"] == 1): ?><li class="<?php echo ($vo["city"]); ?> current item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>&<?php echo ($queryString); ?>"><?php echo ($vo["city"]); ?></a></li>
                            <?php else: ?>
                                <li class="<?php echo ($vo["city"]); ?> item"><a href="?opencity=<?php echo ($vo["pinyin"]); ?>&<?php echo ($queryString); ?>"><?php echo ($vo["city"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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


        

<div class="banner">
    <div class="buy">
		<a href="./">我要卖车</a>
	</div>
</div>


        <div class="step">

    <p class="step-title m-section-tt"><span>轻松四步 完成交易</span></p>

    <div class="step-box">
        <div class="step-box-small even">
            <div class="title">
                <i class="num num01"></i>
                <div class="tt">
                    <p class="en">Advance Appointment</p>
                    <p class="ct">预约卖车</p>
                    <p class="info">线上预约 简单方便</p>
                </div>
            </div>
            <div class="img">
                <img src="/www/Public/dev/img/sale/sale-step-pic01.jpg">
            </div>
        </div>

        <div class="step-box-small odd">

            <div class="img">
                <img src="/www/Public/dev/img/sale/sale-step-pic02.jpg">
            </div>

            <div class="title">
                <i class="num num02"></i>
                <div class="tt">
                    <p class="en">Onsite Service</p>
                    <p class="ct">上门检测</p>
                    <p class="line"></p>
                    <p class="info">免费服务 轻轻松松</p>
                </div>
            </div>
        </div>
    </div>

    <div class="step-box">
        <div class="step-box-small even">
            <div class="title">
                <i class="num num03"></i>
                <div class="tt">
                    <p class="en">Online Auction</p>
                    <p class="ct">在线竞拍</p>
                    <p class="line"></p>
                    <p class="info">足不出户 线上比价</p>
                </div>
            </div>
            <div class="img">
                <img src="/www/Public/dev/img/sale/sale-step-pic03.jpg">
            </div>
        </div>

        <div class="step-box-small odd">
            <div class="title">
                <i class="num num04"></i>
                <div class="tt">
                    <p class="en">Close Deal</p>
                    <p class="ct">签约成交</p>
                    <p class="line"></p>
                    <p class="info">签订合同 完成交易</p>
                </div>
            </div>
            <div class="img">
                <img src="/www/Public/dev/img/sale/sale-step-pic04.jpg">
            </div>
        </div>
    </div>
</div>


        <div class="faq">
	<div class="main_container">

		<h2 class="faq-title m-section-tt"><span>答疑解惑</span></h2>

		<div class="faq-box">

			<div class="faq-box-small">
				<h3 class="tt">Q1 迈迈车怎么帮您卖车？</h3>
				<p class="ct ct60">迈迈车是二手车交易的第三方二手车竞拍平台，通过上门评估，组织3000家买家线上竞拍，提供免费过户代办，为您提供高效便捷安全的卖车服务，帮您足不出户把车卖出最优价。</p>
			</div>

			<div class="faq-box-small diff">
				<h3 class="tt">Q2 交易过程中需要哪些费用？</h3>
				<p class="ct ct60">对于个人车主卖家，迈迈车在整个的服务过程中（包括上门评估、手续代办过户等一系列服务）都是免费的。</p>
			</div>


			<div class="faq-box-small">
				<h3 class="tt">Q3 如何卖价更高？</h3>
				<p class="ct ct80">买家比较看重漆面保养，划痕，保养情况等，因此您在卖车前最好能提前修复外观(可走保险)，保证车的清洁，并且出示4s店的保养记录，这样可以相对卖个高价。</p>
			</div>


			<div class="faq-box-small diff">
				<h3 class="tt">Q4 多久能收到车款？</h3>
				<p class="ct ct80">检测完一天内您将收到报价，如您同意成交，在签署交易协议后，即可在24小时之内收到50%的车款，剩余50%款项过户完成后即刻收取。</p>
			</div>
		</div>

		<div class="faq-more">
			<a href="./introduction.html">更多问题&gt;&gt;</a>
		</div>
	</div>
</div>


        <div class="footer">
    <div class="footcenter">
        <div class="footer-con">
            <div class="footer-left">
                <img class="logoimg" src="/www/Public/dev/img/source/pbl/logo.png" alt="" />
                <div class="txt"><i class="tel"></i>400-9907-999</div>
                <div class="txt wxfont"><i class="wx"></i>关注微信
                    <div class="footer-left-wechat ewm">
                        <div class="img">
                            <img class="js-ft-wechat" src="/www/Public/dev/img/source/pbl/qr--wechat.jpg" alt="迈迈车官方网站-专业检测评估卖车平台,迈迈车LOGO">
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


        <!-- IE8及以下支持JSON -->
        <!--[if lt IE 9]>
            <script src="https://g.alicdn.com/aliww/ww/json/json.js" charset="utf-8"></script>
        <![endif]-->
        <!-- 自动适配移动端与pc端 -->
        <script src="https://g.alicdn.com/aliww/??h5.imsdk/2.1.0/scripts/yw/wsdk.js,h5.openim.kit/0.3.7/scripts/kit.js" charset="utf-8"></script>
        <script src="/www/Public/dev/lib/js/jquery-1.11.3.min.js" charset="utf-8"></script>
        <script src="/www/Public/dev/js/pbl.js" charset="utf-8"></script>

        
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
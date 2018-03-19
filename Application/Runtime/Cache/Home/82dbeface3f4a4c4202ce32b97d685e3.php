<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">

        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
		<link rel="stylesheet" href="/www/Public/prd/css/pbl-f652e5d4d6.css">
        <link rel="stylesheet" href="/www/Public/prd/css/info-notice-dca7b6899d.css">
    </head>
    <body>

        <div class="wrapper">
    <div class="header">
        <h1 class="logo">
            <?php if($level == 'top'): ?><a href="./">
            <?php else: ?>
                <a href="../"><?php endif; ?>
                <img src="/www/Public/prd/img/source/pbl/other-logo.png" />
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


        <div class="banner saleguidebg">
  <div class="main_container">
      <div class="banner-title">
          <h2 class="ct">卖车指南</h2>
          <p class="tt">Sale Guide</p>
      </div>
    </div>
</div>

<div class="main_container m-column">
  <div class="m-column-tab">
    <p class="tt">卖车指南</p>
    <ul class="ct">
      <?php if($level == 'top'): ?><li class="<?php echo ($action_name=='process'? 'current':''); ?>"><a href="./process.html">卖车流程</a></li>
        <li class="<?php echo ($action_name=='introduction'? 'current':''); ?>"><a href="./introduction.html">卖车须知</a></li>
      <?php else: ?>
        <li class="<?php echo ($action_name=='process'? 'current':''); ?>"><a href="../process.html">卖车流程</a></li>
        <li class="<?php echo ($action_name=='introduction'? 'current':''); ?>"><a href="../introduction.html">卖车须知</a></li><?php endif; ?>
    </ul>
  </div>

  <div class="m-column-ct">
   
    <p class="tt">卖车须知</p>
   
    <div class="notice">
      
      <div class="notice-small">
        <h2>Q1: 迈迈车怎么帮您卖车？</h2>
        <p>迈迈车是国内首家二手车高价比卖网，每天超过3000专业买家同时为每一辆车出价，为您的爱车比出最高价。同时，迈迈车还免费提供上门检测、手续代办等一站式服务。</p>
      </div>
      
      <div class="notice-small">
        <h2>Q2: 交易过程中需要哪些费用？</h2>
        <p>对于个人车主，迈迈车在整个的服务过程中（包括上门检测、在线比价竞拍，手续代办过户等一系列服务）都是免费的。</p>
      </div>

      <div class="notice-small">

          <h2>Q3: 卖车的流程怎么走？</h2>

          <div class="notice-small-progress">
            <div class="notice-small-progress-box">
              <p class="title">1、免费预约卖车</p>
              <p class="content">您可以线上进行提交卖车需求，客服将第一时间为您服务</p>
          </div>


          <div class="notice-small-progress-box">
              <p class="title">2、免费上门评估</p>
              <p class="content">专业检测师上门为您的车辆进行全方位检测评估，真正反映价值</p>
          </div>


          <div class="notice-small-progress-box">
              <p class="title">3、全国买家竞拍</p>
              <p class="content">超过3000专业买家线上同时出价竞拍，确保您的车辆能卖出最高价</p>
          </div>


          <div class="notice-small-progress-box">
              <p class="title">4、极速安全交易</p>
              <p class="content">提供材料核对、资金代管、过户办理等一站式服务，当天车款极速到账</p>
          </div>

      </div>


      <div class="notice-small">
        <h2>Q4: 如果对竞价价格不满意怎么办？</h2>
        <p>当您收到迈迈车的竞拍报价后，如果对价格不满意，请您拨打迈迈车客户服务热线400-9907-999反映您的疑虑，您也可以申请重新竞拍。</p>
      </div>

      <div class="notice-small">
        <h2>Q5: 如何卖价更高？</h2>
        <p>买家比较看重漆面保养，划痕，保养情况等，因此您在卖车前最好能提前修复外观(可走保险)，保证车的清洁，并且出示4S店的保养记录，这样可以相对卖个高价。</p>
      </div>

      <div class="notice-small">
        <h2>Q6: 确认价格后如何成交？</h2>
        <p>当您接受迈迈车比价竞拍的最高价格后，客服人员会与您预约成交的时间，成交手续在迈迈车检测中心门店办理，迈迈车提供全程免费代办过户等相关手续。如您对地址或前往路线有任何问题，可随时拨打迈迈车客户服务热线400-9907-999，我们期待您的光临！</p>
      </div>

      <div class="notice-small">
        <h2>Q7: 多久能收到车款？</h2>
        <p>检测完一天内您将收到报价，如您同意成交，在签署交易协议后，您当场可收到预付款，剩余50%款项过户完成后即刻收取。</p>
      </div>

      <div class="notice-small">
        <h2>Q8: 我需要准备哪些手续材料？</h2>
        <p>车辆成交所需的证件和手续，主要包括机动车行驶证、居民身份证、保险单、机动车登记证书、车辆购置税完税证明。迈迈车再次提醒您，请您仔细核对《车辆证件及手续材料确认单》。如果您在核对过程中，发现您的手续材料有所缺失，不用担心，迈迈车可以为您提供专业代办。</p>
      </div>

      <div class="notice-small">
        <h2>Q9: 如何保证交易手续的安全性？</h2>
        <p>为了确保您的车辆交易的安全性，迈迈车会为您的车辆成交提供全程担保服务，委派专人负责客户车辆过户的证件和手续安全，确保您的证件不被非法使用。在交易过程中，如果因为迈迈车或专业买家的原因致使交易过程产生问题，迈迈车先行赔付。</p>

      </div>

      <div class="notice-small">
        <h2>Q10: 为什么要进行车辆检测？</h2>
        <p>通过迈迈车的专业检测，还原您的爱车真实车况，便于为您组织公正公平的线上比价竞拍，确保您的爱车不会因为无关紧要或者无中生有的问题，影响车辆竞拍的价格。</p>
      </div>

      <div class="notice-small">
        <h2>Q11: 迈迈车车辆检测有哪几种方式？</h2>
        <p>1、到店检测方式：您可以选择空闲时间，自行到店参与检测，让您感受到五星级的客户服务。</p>
        <p>2、上门服务方式：迈迈车可根据您的时间，安排专业的检测工程师上门专程为您服务。</p>
      </div>

       <div class="notice-small">
        <h2>Q12: 要进行哪些检测，多长时间？</h2>
        <p>迈迈车自主研发的车辆检测体系（ARQS）能够如实反映车辆真实状况。整个车辆的检测时间大约只需30分钟。此外检测过程中，迈迈车的检测工程师还会与您确认车辆证件与手续材料，确保您的爱车卖出更高价。</p>
      </div>

    </div>

    </div>
  </div>
</div>


        <div class="footer">
    <div class="footcenter">
        <div class="footer-con">
            <div class="footer-left">
                <img class="logoimg" src="/www/Public/prd/img/source/pbl/logo.png" alt="迈迈车官方网站-专业检测评估卖车平台,迈迈车LOGO" />
                <div class="txt"><i class="tel"></i>400-9907-999</div>
                <div class="txt wxfont"><i class="wx"></i>关注微信
                    <div class="footer-left-wechat ewm">
                        <div class="img">
                            <img class="js-ft-wechat" src="/www/Public/prd/img/source/pbl/qr--wechat.jpg">
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
					<span><img src="/www/Public/prd/img/pbl/aside-nav-service-close.png"></span>
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
						<img src="/www/Public/prd/img/pbl/aside-nav-tel-phone.png" />
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
					<img src="/www/Public/prd/img/source/pbl/qr--wechat.jpg">
					<p>扫一扫关注微信</p>
				</div>
			</div>
		</li>

		<li class="app">
			<i class="i app-icon"></i>
			<div class="app-ewmbox">
				<div class="app-ewm">
					<p>下载APP</p>
					<img src="/www/Public/prd/img/source/pbl/qr--download.png">
					<p>扫一扫下载APP</p>
				</div>
			</div>
		</li>

		<!-- <li class="goto js-aside-nav-goto_top">
			<i class="i goto-icon"></i>
		</li> -->
	</ul>
</div>



        <script src="/www/Public/prd/lib/js/jquery-1.11.3.min.js" charset="utf-8"></script>
        <script src="/www/Public/prd/js/pbl-dcc1e1efe5.js" charset="utf-8"></script>
        
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
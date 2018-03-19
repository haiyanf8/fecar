<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">

        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keywords); ?>">
        <meta name="description" content="<?php echo ($description); ?>">
        <link rel="stylesheet" href="/www/Public/prd/css/pbl-a77f0bfe53.css">
        <link rel="stylesheet" href="/www/Public/prd/css/valuate-detail-db719d96e7.css">
    </head>

    <body>

        <div class="wrapper">
    <div class="header">
        <h1 class="logo">
            <?php if($level == 'top'): ?><a href="./">
            <?php else: ?>
                <a href="../"><?php endif; ?>
                <img src="/www/Public/prd/img/source/pbl/logo.png" />
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
    <a class="idx" href="/">首页</a>
    <span>></span>
    <a href="./valuate-index.html">估价</a>
    <span>></span>
    <a href="#"><?php echo ($modelData[0]['modelname']); ?> <?php echo ($modelData[0]['stylename']); ?></a>
</div>

<div class="infodetail">

    <div class="infodetail-pic">
        <img src="<?php echo ($modelData[0]['modelpic']); ?>">
    </div>

    <div class="infodetail-desc">
        <h3 class="tt"><?php echo ($modelData[0]['modelname']); ?> <?php echo ($modelData[0]['stylename']); ?></h3>
        <ul class="param">
            <li class="item">
                <p class="title">车辆归属</p>
                <p class="content"><?php echo ($city[0]['city']); ?></p>
            </li>
            <li class="item">
                <p class="title">上牌日期</p>
                <p class="content"><?php echo ($date); ?></p>
            </li>
            <li class="item">
                <p class="title">表显里程</p>
                <p class="content"><?php echo ($mile); ?>万公里</p>
            </li>
            <li class="item">
                <p class="title">环保标准</p>
                <p class="content"><?php echo ($modelData[0]['emission']); ?></p>
            </li>
            <li class="item diff">
                <p class="title">变速箱</p>
                <p class="content"><?php echo ($modelData[0]['gearbox']); ?></p>
            </li>
            <li class="item diff">
                <p class="title">汽车排量</p>
                <p class="content"><?php echo ($modelData[0]['volume']); ?>T</p>
            </li>
            <li class="item diff">
                <p class="title">新车售价</p>
                <p class="content"><?php echo ($priceData['price_bn']); ?>万</p>
            </li>
            <li class="item diff"></li>
        </ul>
    </div>
</div>


                <div class="situation">
	<div class="situation-price">
		<span class="access">估价：<em class="money">￥<?php echo round($priceData['max_sell_price']/10000,2);?></em><em class="line">-</em><em class="money">￥<?php echo round($priceData['max_private_price']/10000,2);?></em><em class="unit">万</em></span>
		<span class="from">
			估价技术支持
			<img src="/www/Public/prd/img/valuate-detail/situation-from.png" />
		</span>
	</div>

	<div class="situation-desc">
		<p class="ct">仅为市场行情估算，实际车价参考以下车况：</p>

		<div class="detail">
			<ul>
				<li class="item">
					<h3><i class="icon appearance"></i>车辆外观</h3>
					<p>是否补漆</p>
					<p>有无划痕凹陷</p>
					<p>有无改色，贴纸，贴膜</p>
				</li>

				<li class="item">
					<h3><i class="icon case"></i>车辆工况</h3>
					<p>发动机，变速箱，是否正常</p>
					<p>助力，空调，车窗，天窗是否正常</p>
					<p>车窗，天窗是否正常</p>
				</li>

				<li class="item">
					<h3><i class="icon upholstery"></i>车辆内饰</h3>
					<p>有无磨损或污渍</p>
				</li>

				<li class="item">
					<h3><i class="icon other"></i>其它</h3>
					<p>不可更换部分是否损伤</p>
					<p>是否4S店保养</p>
					<p>过户次数</p>
				</li>
			</ul>
		</div>
	</div>

	<div class="situation-know">
		<div class="txt">
			<span class="txt ">了解<em class="yl">全面车况</em></span> 
		</div>

		<div class="icon">
			<img src="/www/Public/prd/img/valuate-detail/arrow.gif" >
		</div>

		<div class="btn js-accurate-valuation">
			<span>精准估价</span>
		</div>
	</div>

	<div class="ourfeature">

		<h2>我们的特色</h2>
	
		<ul>
			<li class="item">
				<img src="/www/Public/prd/img/valuate-detail/ourfeature-01.png" class="img">
				<div class="txt">
					<p>1、车检师提供免费</p>
					<p>上门检测服务</p>
				</div>
			</li>
			<li class="item">
				<img src="/www/Public/prd/img/valuate-detail/ourfeature-02.png" class="img">
				<div class="txt">
					<p>2、海量历史卖车</p>
					<p>数据支撑</p>
				</div>
			</li>

			<li class="item">
				<img src="/www/Public/prd/img/valuate-detail/ourfeature-03.png" class="img">
				<div class="txt">
					<p>3、实时新车指导</p>
					<p>价格分析</p>
				</div>
			</li>

			<li class="item">
				<img src="/www/Public/prd/img/valuate-detail/ourfeature-04.png" class="img">
				<div class="txt">
					<p>4、专业的定价团队</p>
					<p>为您服务</p>
				</div>
			</li>

		</ul>
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


            </div>
        </div>

        <div class="valuate-salecar-wrap">
    <div class="valuate-salecar-box">
        <div class="valuate-salecar-box-close js-close"></div>
        <div class="valuate-salecar-box-small">
            <input class="js-tel" maxlength="11" type="text" placeholder="请输入手机号">
            <div class="valuate-salecar-box-small-btn js-salebtn">
                <span></span>
            </div>
        </div>
    </div>
</div>


        <div class="footer">
    <div class="footcenter">
        <div class="footer-con">
            <div class="footer-left">
                <img class="img" src="/www/Public/prd/img/source/pbl/logo.png" alt="" />
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


        <div class="pbl-success-alert js-success-alert">
    <div class="wrap--success">
      <div class="title js-title">信息提交成功</div>
        <div class="content js-content">
            <p>我们会第一时间联系您</p>
            <p>如需了解更多详情请关注微信号。</p>
            <img src="/www/Public/prd/img/source/pbl/qr--wechat.jpg">
        </div>
        <div class="btn--yes js-btn--no">确定</div>
        <div class="close js-close"></div>
    </div>
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


        <script src="/www/Public/prd/lib/js/jquery-1.11.3.min.js" charset="utf-8"></script>
        <script src="/www/Public/prd/js/pbl-dcc1e1efe5.js" charset="utf-8"></script>
        <script src="/www/Public/prd/js/valuate-detail-838bb34430.js" charset="utf-8"></script>
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
<?php
return array(
	'city2ip'	           => 'http://api.map.baidu.com/location/ip?ak=94a72387dc856a07e440cc12269b05fd&ip=',

    'API_URL'            => 'http://api.fecar.com/msg/sell', 
    'TEST_API_URL'       => 'http://test.api.fecar.com/msg/sell',
    'API_TOKEN'            => '41f0fe201e44ae9fdd12c15d2be7344e',
    'imgPath'    =>'http://imgam.fecar.cn/fecar_mk/auction/Public/uploads/',    
    'GPJ_API_URL'  => 'http://openapi.gongpingjia.com/api/cars/evaluation/fecar/',
	//检测端图片地址
	'CHECK_URL' => 'http://img.fecar.com/static/',
    'IMG_URL'   => 'http://img.fecar.com/static/Ueditor/',
    'TEST_IMG_URL' => 'http://test.img.fecar.com/static/Ueditor/',

    'ORIGIN_API' => 'http://api.fecar.com/msg/sell',
    'TEST_ORIGIN_API' => 'http://test.api.fecar.com/msg/sell',

    'DOMAIN_NAME' => 'www.fecar.com',
	
	//多模块访问
	'MULTI_MODULE'         => false,
	//默认模块
	'DEFAULT_MODULE'       => 'Home',
        
	//URL地址不区分大小写
	'URL_CASE_INSENSITIVE' => true,
	
	//URL模式
	'URL_MODEL' => 2,
    //URL 改写
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES' =>array(
         ''        =>'Index/index',
         //'history/:'  =>'History/history',
         'sale'     =>'sale/index',
         'store-index'    =>'store/index',
         'history'  => 'history/index',
         'history-detail/:carid'=>'history/detail',
         'article'  => 'article/index',
         //'article-cate' => 'article/index',
         'article-cate/:id' => 'article/index',
         'article-detail/:id' => 'article/detail',
         'valuate-index'      => 'valuate/index',
         'valuate-detail'     => 'valuate/detail',
         'valuate-submit'     => 'valuate/submit',
         'intro'              => 'static/intro',
         'business'           => 'static/business',
         'process'            => 'static/process',
         'introduction'       => 'static/introduction',
         //'article/listing/:id' => 'article/listing',
    ),
        
    /* 'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    3600,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  
            'Index:index'    =>     array('index{city}', '3600'),
			'Store:index'    =>     array('store', '3600')
             ) */
        
        
        
    'LOAD_EXT_CONFIG' => 'database',

	'CAR_SUMMARY' => array(
		'outter_decorate' => array(//外观
			'多处做漆',
			'局部做漆',
			'全车做漆',
			'多处色差',
			'局部色差',
			'多处划痕',
			'局部划痕',
			'多处凹陷',
			'局部凹陷',
		),
		'inner_decorate' => array(//内饰
			'多处污渍',
			'局部污渍',
			'多处磨损',
			'局部磨损',
		),
		'engine' => array(//发动机
			'发动机渗油',
			'发动机漏油',
			'发动机异响',
			'变速箱渗油',
			'变速箱漏油',
			'变速箱异响',
			'发动机缸体拆卸',
			'气门饰盖拆卸',
			'油底壳拆卸',
			'变速箱拆卸',
			'启动困难',
			'发动机曾更换已备案',
			'变速箱曾更换',
			'方向助力渗油',
			'方向助力异响',
			'发动机曾更换未备案',
			'烧机油',
			'空调不制冷',
			'空调不制热',
			'怠速抖动',
			'自排挂档冲击',
			'挂档困难',
		),
		'accident' => array('是', '否', '多处事故'),//事故车
		'other' => array(//其他
			'此车曾泡水',
			'此车曾火烧',
			'变速箱曾召回',
			'此车为美规车',
			'此车为中东版',
			'未见车辆登记证',
			'未见交强险保单'
		),
	),
        
);

<?php
namespace Home\Controller;
use Common\Common\Util\Page;
// use Common\Common\Page;

class HistoryController extends BaseController
{

    private $_appointModel = null; // 预约信息列表
    private $_seoModel = null;

    public function __construct()
    {
        parent::__construct();
        $this->_appointModel = D('appoint');
        $this->_seoModel = D('seo');
    }

    public function index()
    {
        $pageSize = 12;
        $sellModel = D('auction');
        // 获取记录总数
        $wheres = $this->explainWhere();
        $where = $wheres[0];

        $count = $sellModel->getHisSellDataList($where, '', '', 1);
        $pobj = new Page($count, 12,$wheres[1]);
        
        $pobj->setConfig('theme', '%upPage%  %linkPage% %downPage%');
        $propobj->rollPage = 5;
        $limit = $pobj->firstRow . "," . $pobj->listRows;
        // 获取历史竞拍主页数据
        $selldata = $sellModel->getHisSellDataList($where, 'auction.create_time desc', $limit);
        //将显示图片改成缩略图
        // 获取本周竞拍
        $hotSellData = $sellModel->getHisSellDataList('',
                'bid_times', 6);
        // 咨询人数
        $appointCount = $this->_appointModel->appointCount();
        // 分配数据
        $this->assign('hotSellData', $hotSellData);
        $this->assign('sellData', $selldata);
        $this->assign('pageStr', $pobj->show());
        $this->assign('count', ceil($count / $pageSize));
        $this->assign('appointCount', $appointCount[0]['number']);
        
        $this->assign('action_name', 'history');

        $seoData = $this->_seoModel->getSeoByIdent('history');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);
        // 筛选条件

        $hcwhere['open'] = '1';
        $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
        foreach ($hotcity as &$value) {
            if ($value['city'] == session('opencity')) {
                $value['current'] = 1;
            } else {
                $value['current'] = 0;
            }
        }
        $this->assign('hotcity', $hotcity);

        $field = '`site`, `sitename`, `rank`';
        $order = '`rank` desc';
        $links = D('link')->getLinks($field, $order, '');
        $this->assign('links', $links);

        $this->assign('level', 'top');

        $this->display('Index:history');
    }
    
    protected function _dealSelectCondition(){
        //接受参数
    	$queryArr = I('get.');
    	if( !$queryArr ){
    		return array();
    	}
    	
    	if($queryArr['brand'] ){
    	    if(session('seearch_brand')){
    	        if($queryArr['brand'] != session('seearch_brand')){
    	            $queryArr['series'] = null;
    	            $queryArr['model'] = null;
    	        }
    	    }
    	    session('seearch_brand',$queryArr['brand']);
    	    	
    	    $this->assign('brand', $queryArr['brand']);
    	
    	}
    	 
    	if( $queryArr['series']){
    	    if(session('seearch_series')){
    	        if( $queryArr['series'] != session('seearch_series')){
    	            $queryArr['model'] = null;
    	        }
    	    }
    	    session('seearch_series', $queryArr['series']);
    	    $this->assign('series',  $queryArr['series']);
    	}
    	 
    	if($queryArr['model']){
    	    $this->assign('model', $queryArr['model']);
    	}
    	
    	// 表单传递的参数
    	$minmile = I('minmile');
    	if($minmile){
    	    $queryArr['mile'] = '0-'.$minmile;
    	    //$this->assign('minmile', $minmile);
    	}
    	
    	
    	$maxmile = I('maxmile');
    	if($maxmile){
    	    $queryArr['mile'] = '0-'.$maxmile;
    	    //$this->assign('maxmile', $maxmile);
    	}
    	if($minmile && $maxmile){
    	    $trueMinOrMile = $this->compare2num($minmile, $maxmile);
    	    $queryArr['mile'] = $trueMinOrMile[0].'-'.$trueMinOrMile[1];
    	    //$this->assign('minmile', $trueMinOrMile[0]);
    	    //$this->assign('maxmile', $trueMinOrMile[1]);
    	}
    	
    	$minage = I('minage');
    	if($minage){
    	    $queryArr['age'] = '0-'.$minage;
    	    //$this->assign('minage', $minage);
    	}
    	
    	
    	$maxage = I('maxage');
    	if($maxage){
    	    $queryArr['age'] = '0-'.$maxage;
    	    $this->assign('maxage', $maxage);
    	}
    	
    	if($minage && $maxage){
    	    $trueMinOrMile = $this->compare2num($minage, $maxage);
    	    $queryArr['age'] = $trueMinOrMile[0].'-'.$trueMinOrMile[1];
    	    //$this->assign('minage', $trueMinOrMile[0]);
    	    //$this->assign('maxage', $trueMinOrMile[1]);
    	}
    	
    	$minprice = I('minprice');
    	if($minprice){
    	    $queryArr['price'] = '0-'.$minprice;
    	    //$this->assign('minprice', $minprice);
    	}
    	
    	 
    	$maxprice = I('maxprice');
    	if($maxprice){
    	    $queryArr['price'] = '0-'.$maxprice;
    	   // $this->assign('maxprice', $maxprice);
    	}
    	
    	if($minprice && $maxprice){
    	    $trueMinOrMile = $this->compare2num($minprice, $maxprice);
    	    $queryArr['price'] = $trueMinOrMile[0].'-'.$trueMinOrMile[1];
    	    //$this->assign('minprice', $trueMinOrMile[0]);
    	    //$this->assign('maxprice', $trueMinOrMile[1]);
    	}
    	
    	$this->assign('age', $queryArr['age']);
    	$this->assign('mile', $queryArr['mile']);
    	$this->assign('price',$queryArr['price']);
    	
    	//解析参数
    	$param = array();
    	foreach ($queryArr as $key=>$value){
    	    if($key != 'p' && 
    	    $key != 'minprice' && $key != 'maxprice' 
    	    && $key != 'minage' && $key != 'maxage'
    	    && $key != 'minmile' && $key != 'maxmile'
    	    && $key != 'opencity'                
    	){
    	        if($key != 'brand' && $key != 'model' && $key != 'series'){
    	            $param['brand'][$key] = $value;
    	        }
    	        if($key != 'model' && $key != 'series'){
    	             $param['series'][$key] = $value;
    	        }
    	        if($key != 'model'){
    	        	$param['model'][$key] = $value;
    	        }
    	        if($key != 'mile'){
    	            $param['mile'][$key] = $value;
    	        }
    	        if($key != 'age'){
    	            $param['age'][$key] = $value;
    	        }
    	        if($key != 'price'){
    	            $param['price'][$key] = $value;
    	        }
    	        $param['page'][$key] = $value;
    	    }
    	}
    	$explainedParam =array();
    	foreach ($param as $k=>$v){
    		
    		if( !empty($v) ){
    		    $explainedParam[$k] = http_build_query($v);
    		    $explainedParam[$k] = '&'.$explainedParam[$k];
    		}else{
    		    $explainedParam[$k] = array();
    		}
    	}
    	//分配
    	$this->assign('param',$explainedParam);
    	return array($queryArr,$explainedParam['page']);
    }
    
    protected function explainWhere(){
    	$whereParams = $this->_dealSelectCondition();
    	$whereParam = $whereParams[0];
    	$where = array();
    	//品牌
    	if($whereParam['brand']){
    		$where['base.brand'] = $whereParam['brand'];
    	}
    	//车系
    	if($whereParam['series']){
    	    $where['base.model'] = $whereParam['series'];
    	}
    	//车型
    	if($whereParam['model']){
    	    $where['base.style_sell_name'] = $whereParam['model'];
    	}
    	//车龄
    	if($whereParam['age']){
    	    $ageArr = explode('-', $whereParam['age']);
    	    $this->assign('minage',$ageArr[0]);
    	    $this->assign('maxage',$ageArr[1]);
    	    $where['base.regist_date'] = array(
    	            'BETWEEN',
    	            array(
    	                    time() - $ageArr[1] * 365 * 24 * 3600,
    	                    time() - $ageArr[0] * 365 * 24 * 3600
    	            )
    	    );
    	}
    	//车价
    	if($whereParam['price']){
    	    $priceArr = explode('-', $whereParam['price']);
    	    $this->assign('maxprice',$priceArr[1]);
    	    $this->assign('minprice',$priceArr[0]);
    	    $where['auction.win_price'] = array(
    	            'BETWEEN',
    	            array(
    	                    intval($priceArr[0]) * 10000,
    	                    intval($priceArr[1]) * 10000
    	            )
    	    );
    	    
    	}
    	//公里数
    	if($whereParam['mile']){
    	    
    	    $mileArr = explode('-', $whereParam['mile']);
    	    $this->assign('maxmile',$mileArr[1]);
    	    $this->assign('minmile',$mileArr[0]);
    	    $where['base.kilometers'] = array(
    	            'BETWEEN',
    	            array(
    	                    intval($mileArr[0]) * 10000,
    	                    intval($mileArr[1]) * 10000
    	            )
    	    );
    	    
    	}
    	return array($where,$whereParams[1]);
    }
    public function detail()
    {
        $carid = I('carid');
        $sellModel = D('auction');
        // 基本信息
        
//        $carDetailInfo1 = $sellModel->getHisSellData($where, 'a.create_time desc', 1, 1);
        $carDetailInfo = $sellModel->getHisSellDetail($carid);
        $imgInfo = $sellModel->getCarImg($carid);

        if (! $carDetailInfo) {
            $this->index();
            return;
        }

        // 处理后的检测说明
//        $this->assign('report',
//                $this->dealCheckReport($carDetailInfo['report']));
		$this->assign('report',$this->reports($carid));
        //print_r($this->dealCheckReport($carDetailInfo[0][0]['report']));
        // 处理后的排量
        $this->assign('learge', 
                $this->getCarLargeFromSellName(
                        $carDetailInfo['style_sell_name']));
        $this->assign('mainConfig',$this->dealCheckConfig($carDetailInfo['configuration'],$carDetailInfo['choose_conf']));

        $this->assign('img',$imgInfo);
        $this->assign('carDetailInfo', $carDetailInfo);
        
        $this->assign('action_name', 'history');
        $this->assign('true_action_name', 'history');
        // 标题关键字 描述
        $this->assign('title', 
                $carDetailInfo[0][0]['info'] . '竞拍历史—迈迈车官网');

        $seoArr = $this->splitTitle($carDetailInfo[0][0]['info']);
        $city = $carDetailInfo[0][0]['area'];

        $this->assign('keywords', 
            $city . $seoArr[0] . ", " . $city . $seoArr[1] . ", " . $city . $seoArr[1] . " " . $seoArr[2] 
            . ", " . $city . $seoArr[1] . " " . $seoArr[2] . " " . $seoArr[3] . " " . $seoArr[4]);
        $this->assign('description', $city . "二手" . $seoArr[0] . ", 二手" . $seoArr[1] . $seoArr[2] . " " . $seoArr[3] . " " . $seoArr[4]  
                . ', 车况好，无事故，保养好，更多福州二手车就上迈迈车卖车网。');

        $field = '`site`, `sitename`, `rank`';
        $order = '`rank` desc';
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        $hcwhere['open'] = '1';
        $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
        foreach ($hotcity as &$value) {
            if ($value['city'] == session('opencity')) {
                $value['current'] = 1;
            } else {
                $value['current'] = 0;
            }
        }
        $this->assign('hotcity', $hotcity);

        $this->assign('level', 'second');

        $this->display('Index:auction-detail');
        
    }

    /**
     * 处理空操作
     */
    protected  function _empty ()
    {
        $this->index();
        return;
    }

    /**
     * 把fecar_check中的reprort字段，检测师说明处理为有顺序的数组
     * 
     * @param
     *            $str
     * @return array:
     */
    protected  function dealCheckReport ($str)
    {
        $strDeal = str_replace(array(
                '外观:',
                '内饰:',
                '结构:',
                '工况:',
                '备注:'
        ), array(
                ';外观:',
                ';内饰:',
                ';结构:',
                ';工况:',
                ';备注:'
        ), $str);
        $strDealArr = explode(';', ltrim(trim($strDeal),';'));
        $newarr = array();
        foreach ($strDealArr as $v) {
            $vArr = explode(':', $v);
            $newarr[$vArr[0]] = rtrim(trim($vArr[1]), ',');
            //$newarr[$vArr[0]] = trim(rtrim(rtrim(trim($vArr[1]), ','), '。'));
        }
        return array_filter($newarr);
    }

    /**
     * 从fecar_check中的check_conf_info字段获取排量
     * 
     * @param
     *            $str
     * @return string
     */
    protected function getCarLargeFromSellName ($str)
    {
        $pos = strpos($str, '.');
        $str = substr($str, ($pos - 1), 3);
        return $str;
    }

    /**
     * 详情中的主要配置 这个只有吴学诗懂
     * 
     * @param
     *            $arr1
     * @param
     *            $arr2
     * @return multitype:Ambigous <number>
     */
    protected function dealCheckConfig ($arr1, $arr2)
    {
        $arr1 = json_decode($arr1);
        $arr2 = json_decode($arr2);
        $arr = array_merge($arr1,$arr2);
        //去重
        $configarr = ['c79','c94','c98','c100','c130','c149','c138','c139','c151','c152','c142','c154','c156','c171','c182','c128','c131','c105'];
        $arr = array_flip($arr);
        $arr = array_flip($arr);

        $dealarr = array_intersect($configarr,$arr);
        return $dealarr;
    }


    protected function explainFormDataAndSave ($full, $s)
    {
        $from = $_GET[$full];
        $exp = $_GET[$s];
        if (isset($from)) {
            if ($from) {
                cookie($full, $from);
            } else {
                cookie($full, null);
            }
        }
        if ($exp == 'a' || $exp) {
            cookie($full, null);
        }
        $this->assign($full, cookie($full) ? cookie($full) : '');
        return cookie($full);
    }

    /**
     * 按大小顺序返回两个数
     * 
     * @param number $min            
     * @param number $max            
     * @return array
     */
    protected function compare2num ($min, $max)
    {
        $min = intval($min);
        $max = intval($max);
        if ($min > $max) {
            $temp = $min;
            $min = $max;
            $max = $temp;
        }
        return array(
                $min,
                $max
        );
    }

    protected function splitTitle($title)
    {
        return explode(' ', $title);
    }

	//检测工程师简评
	public function reports($carId)
	{
		$report = M('car_summary','',C('DB_CONFIG3'))->where(['car_base_id' => $carId])->find();//检测师简评
		$list = [];
		foreach($report as $key => $value){
			switch ($key){
				case 'outter_decorate'://外观
				case 'inner_decorate'://内饰
				case 'engine'://机电
				case 'accident'://事故
				case 'other'://其它
					$implode = '';
					if(!empty($value)){
						$decode = json_decode($value, true);
						$arr = [];
						foreach($decode as $v){
							$arr[]= C('CAR_SUMMARY')[$key][$v];
						}
						$implode = implode(',', $arr);
					}
					$data = $implode.','.$report[$key.'_note'];
					$res = trim($data, ',');
					$list[$key] = $res;
					if(empty($res)) $list[$key] = '无';
					break;
				case 'structure_note'://结构
					$list['structure'] = $report['structure_note'];
					if(empty($report['structure_note'])){
						$list['structure'] = "无;";
					}
					break;
			}
		}
		return $list;
	}

}

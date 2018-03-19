<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： BaseController.class.php 
* 摘    要： 应用目录下的控制器基类，继承于Think\Controller，控制器目录下所有的控制器均为该类的子类
* 作    者： 赵阳
* 修改日期:　2016.6.18
*/
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller
{

    /**
     * 类初始化
     */
    protected $_uuid;

    //是否记录的用户访问
    protected $_isInsert;
    
    protected $_channel;
    protected $_url;
    protected $img_url;
    protected $api_url;

    function _initialize ()
    {
        self::mobileOrPc();
        // 获取sessionid作为用户访问的唯一id
        $this->_uuid = session_id();

        if ($_SERVER['SERVER_NAME'] === C('DOMAIN_NAME')) {
            $this->img_url = C('IMG_URL');
            $this->api_url = C('API_URL');
        } else {
            $this->img_url = C('TEST_IMG_URL');
            $this->api_url = C('TEST_API_URL');
        }
        
        // 做标签转义，防止XSS漏洞
        C('DEFAULT_FILTER', 'htmlspecialchars');
        

        // 获取定位城市
        // $cityArr = array(
        //         'xm'       => '厦门',
        //         'xiamen'   => '厦门',
        //         'fz'       => '福州',
        //         'fuzhou'   => '福州',
        //         'sh'       => '上海',
        //         'shanghai' => '上海',
        //         'suz'      => '苏州',
        //         'suzhou'   => '苏州',
        //         'nj'       => '南京',
        //         'nanjing'  => '南京',
        // );

        $city = I('opencity');
        if ($city) {
            $hcwhere['open'] = '1';
            $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
            foreach ($hotcity as $value) {
                if ($value['pinyin'] == $city) {
                    session('opencity', $value['city']);
                    break;
                }
            }
        }

        if (!session('opencity')) {
            session('opencity', self::getCity());
        }
                
        // 初始化缓存
        S(array(
                'type' => 'File',
                'expire' => 24 * 3600
        ));

        //获取用户第一次访问时的地址
        if (!session('first_url')) {
            session('first_url', get_page_url());
        }

        $this->_url = session('first_url');
        
        
        if (!session('channel')) {
            $channel = trim(I('src')) ? trim(I('src')) : 'direct-access';
            session('channel', $channel);
        }

        $this->_channel = session('channel');
        
    }

    /**
     * 根据ip获取定位城市
     * 
     * @return string
     */
    static public function getCity ()
    {
        $city2ipStr = file_get_contents(C('CITY2IP') . get_client_ip('',1));
        $city2ipJson = json_decode($city2ipStr);
        $cityname = $city2ipJson->content->address_detail->city;
        //找不到城市时，默认为上海
        if (!$cityname) {
            return '上海';
        } else {
            //找到时，跟已开通城市做对比
            $city = rtrim($cityname, '市');
            $hcwhere['open'] = '1';
            $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
            foreach ($hotcity as $value) {
                if ($value['city'] == $city) {
                    return $city;
                }
            }
        }

        return '上海';
    }
    
    static protected function mobileOrPc()
    {
        $the_host = $_SERVER['HTTP_HOST'];
        $the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    	if (is_mobile()) {
    		if (strpos($the_host,'test') === false) {
    		    header('Location:http://m.fecar.com'.$the_url);
    		} else {
    			header('Location:http://test.m.fecar.com'.$the_url);
    		}
    	}
    }
    
    /* protected  function insertSource($stat)
    {
        $originModel = D('origin');
        $isAdd = $originModel->field('id')
                            ->where("sessionid='%s'", $this->_uuid)
                            ->find();
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        
        if (!$isAdd) {
            $originModel->insert(
                    array(
                            'sessionid' => $this->_uuid,
                            'access_time' => date('Y-m-d H:i:s'),
                            'ipaddr' => get_client_ip(),
                            'channel' => $this->_channel,
                            'agent' => $userAgent,
                            'url' => get_page_url()
                    ));
        }
    } */
    
    /**
     * 判断是否是蜘蛛爬来
     * @param  $userAgent
     * @return boolean
     */
    static protected function isSpider($userAgent)
    {
        $spider = array(
                'Spider',
                'Bot',
                'Scrapy',
                'Yahoo! Slurp',
                'Python'
        );
        foreach ($spider as $value) {
            if (strripos($userAgent,$value) !== false) {
                return true;
            }
        }
        return false;
    }
}

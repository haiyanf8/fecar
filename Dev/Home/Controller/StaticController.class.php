<?php
namespace Home\Controller;

class StaticController extends BaseController
{

    private $_seoModel = null;

    public function __construct()
    {
        parent::__construct();
        $this->_seoModel = D('seo');
    }

    /**
     * 商务合作
     */
    public function business()
    {
        $seoData = $this->_seoModel->getSeoByIdent('business');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);
        $this->assign('action_name','business');

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
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        if (strpos($_SERVER['PATH_INFO'], 'static') !== false) {
            $this->assign('level', 'second');
        } else {
            $this->assign('level', 'top');
        }

        $this->display('Index:info-business');
    }
    
    /**
     * 卖车流程
     */
    public function process()
    {
        $seoData = $this->_seoModel->getSeoByIdent('process');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);
        $this->assign('action_name','process');

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
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        if (strpos($_SERVER['PATH_INFO'], 'static') !== false) {
            $this->assign('level', 'second');
        } else {
            $this->assign('level', 'top');
        }

        $this->display('Index:info-flow');
    }
    
    /**
     * 公司简介
     */
    public function intro()
    {
       $seoData = $this->_seoModel->getSeoByIdent('intro');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);
        $this->assign('action_name','intro');

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
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        if (strpos($_SERVER['PATH_INFO'], 'static') !== false) {
            $this->assign('level', 'second');
        } else {
            $this->assign('level', 'top');
        }

        $this->display('Index:info-intro');
    }
    
    /**
     * 卖车需知
     */
    public function introduction()
    {
        $seoData = $this->_seoModel->getSeoByIdent('introduction');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);
        $this->assign('action_name','introduction');

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
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        if (strpos($_SERVER['PATH_INFO'], 'static') !== false) {
            $this->assign('level', 'second');
        } else {
            $this->assign('level', 'top');
        }
            
        $this->display('Index:info-notice');
    }
    
    /**
     * 空操作
     */
    protected  function _empty()
    {
        $this->business();
    }
}

<?php
namespace Home\Controller;
use Common\Common\Util\Page;
class SaleController extends BaseController
{
    //在线咨询列表模型
    private $_consult = null;
    //分页大小
    private $_pageSize = 0;
    //竞拍历史模型
    private $_sell = null;
    private $_seoModel = null;

    public function __construct()
    {
        parent::__construct();
        $this->_consult = D('consult');
        // $this->_sell = D('auction');
        $this->_pageSize = 8;
        $this->_seoModel = D('seo');
    }
    
    public function index()
    {
        $where['verify'] = '1';
        $total = $this->_consult->getTotalConsult($where);
        $Page = new Page($total[0]['count'], $this->_pageSize,'','/sale');
        $Page->rollPage = 4;
        $limit = $Page->firstRow . "," . $Page->listRows;
        $Page->setConfig('theme', '%upPage%  %linkPage% %downPage%');

        $field = "`name`, `sex`, `mobile`, `ask-time`, `ask`, `answer`";
        $order = "`ask-time` desc";
        $consultData = $this->_consult->getConsult($where, $field, $limit, $order);
        $this->assign('consultData', $consultData);
        
        //最新成交
        // $latestBid = $this->_sell->getHisSellDataList('','',3);
        // $this->assign('latestBid', $latestBid);
        $this->assign('pageStr', $Page->show());
        $this->assign('action_name', 'sale');
        $this->assign('count', ceil($total[0]['count']/$this->_pageSize));

        $seoData = $this->_seoModel->getSeoByIdent('sale');
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);

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

        $this->display('Index:sale');

    }
    
    protected  function _empty()
    {
        $this->index();
    }
}

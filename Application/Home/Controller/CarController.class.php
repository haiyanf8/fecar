<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： CarController.class.php 
* 摘    要： 获取车辆品牌，系列或车型的类，通过http协议访问
* 作    者： 肖庆平(xiaoqingping@qq.com)
* 修改日期:　2016.6.23
*/
namespace Home\Controller;
use Common\Common\Util\CarBrand;
class CarController extends BaseController
{
    private $_getCar = null;

    public function __construct()
    {
        parent::__construct();
        $this->_getCar = new CarBrand();
    }

    public function brand_test()
    {
        $brandList = $this->_getCar->getBrandList();
        if ($brandList == null) {
            $result = array('status' => 3, 'msg' => '查不到数据');
        } else {
            $result = array('status' => 0, 'msg' => '获取成功', 'result' => $brandList);
        }
        
        echo json_encode($result);
    }

    public function brand()
    {
        $brandList = $this->_getCar->getBrandList();
        if ($brandList == null) {
            $result = array('status' => 3, 'msg' => '查不到数据');
            return;
        }

        $retList = array();
        $alpha = array('Z', 'Y', 'X', 'W', 'V', 'U', 'T', 'S', 'R', 'Q', 'P',
                    'O', 'N', 'M', 'L', 'K', 'J', 'I', 'H', 'G', 'F', 'E', 'D',
                    'C', 'B', 'A');
        foreach ($alpha as $value) {
            $retList = array_merge(array($value => array()), $retList);
        }

        foreach ($brandList as $key => $value) {
            array_push($retList[$value['initial']], array('c2' => $value['c2']));
        }

        foreach ($retList as $key => $value) {
            if (count($retList[$key]) == 0) {
                unset($retList[$key]);
            }
        }

        echo json_encode(array('status' => 0, 'msg' => '获取成功', 'result' => $retList));
    }

    public function series($c2 = null)
    {
        if ($c2 == null) {
            $result = array('status' => 1, 'msg' => '缺少查询条件');
        } elseif ($c2 == '全部') {
            $result = array('status' => 2, 'msg' => '未选择品牌');
        } else {
            $seriesList = $this->_getCar->getCarSeries();
            if ($seriesList == null) {
                $result = array('status' => 3, 'msg' => '查不到数据，请确认查询条件');
            } else {
                $result = array('status' => 0, 'msg' => '获取成功', 'result' => $seriesList);
            }
            
        }

        echo json_encode($result);
    }

    public function model($c2 = null, $c4 = null)
    {
        if ($c2 == null || $c4 == null) {
            $result = array('status' => 1, 'msg' => '缺少查询条件');
        } elseif ($c4 == '全部') {
            $result = array('status' => 2, 'msg' => '未选择车系');
        } else {
            $modelList = $this->_getCar->getCarModel();
            if ($modelList == null) {
                $result = array('status' => 3, 'msg' => '查不到数据，请确认查询条件');
            } else {
                $result = array('status' => 0, 'msg' => '获取成功', 'result' => $modelList);
            }
        }

        echo json_encode($result);
    }
}

<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： AppointModel.class.php 
* 摘    要： 预约模型类
* 作    者： 肖庆平
* 修改日期:　2016.6.20
*/
namespace Home\Model;
use Think\Model;

class AppointModel extends Model
{
    //生成查询条件
    protected function buildWhere()
    {
        $where1 = array(
            'isfake' => '0',
            "DATE_FORMAT(`appoint-time`, '%Y-%m-%d')" => array("eq", date('Y-m-d')),
        );

        $whereSql1 = $this->where($where1)->buildSql();
        $preg_match = preg_match('/WHERE(.*)/', $whereSql1, $matches);
        if ($preg_match) {
            $whereSql = $matches[1];
            $whereSql = '(' . $whereSql;
        }

        $where2 = array(
            'isfake' => '1',
            "DATE_FORMAT(`appoint-time`, '%H:%i:%s')" => array('lt', date('H:i:s')),
        );

        $where = array(
            '_complex' => $where2,
            '_string' => $whereSql,
            '_logic' => 'or'
        );

        return $where;
    }

    //提交预约信息
    public function insertAppoint($data)
    {
        return $this->add($data);
    }

    //获取今天预约数据，该数据从假数据中获取，假数据中时间字段包含日期和时间，但是只需要获取
    //时间即可，该查询获取更早时间的记录
    public function getTodayAppoint($field, $order)
    {
        $where = $this->buildWhere();
        return $this->where($where)->field($field)->order($order)->select();
    }

    //获取预约数
    public function appointCount()
    {
        $field = "count(`mobile`) as `number`";

        return $this->getTodayAppoint($field, '');
    }

}

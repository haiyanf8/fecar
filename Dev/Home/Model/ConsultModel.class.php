<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： ConsultModel.class.php 
* 摘    要： 在线咨询模型类
* 作    者： 肖庆平
* 修改日期:　2016.6.21
*/
namespace Home\Model;
use Think\Model;

class ConsultModel extends Model
{
    //获取已审核的咨询列表
    public function getConsult($where=null, $field=null, $limit=null, $order=null)
    {
        return $this->where($where)->field($field)->order($order)->limit($limit)->select();
    }

    //获取已审核的咨询总数
    public function getTotalConsult($where)
    {
        $field = "count(*) as `count`";
        return $this->where($where)->field($field)->select();
    }

    //新增咨询
    public function insertConsult($data)
    {
        return $this->add($data);
    }

    //审核咨询，默认根据id审核
    public function verifyConsult($where = null)
    {
        $this->where($where)->setField('verify', 1);
    }

    //删除咨询条目，默认根据id删除
    public function deleteConsult($where)
    {
        $this->where($where)->delete();
    }
}

<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： OriginModel.class.php 
* 摘    要： 来源统计模型
* 作    者： 肖庆平
* 修改日期:　2016.6.30
*/
namespace Home\Model;
use Think\Model;

class OriginModel extends Model
{
    public function insertOrigin($data)
    {
        return $this->add($data);
    }

    public function getOrigins($where, $field, $order, $limit)
    {
        return $this->where($where)->field($field)->order($order)->limit($limit)->select();
    }

    public function deleteOrigin($where)
    {
        return $this->where($where)->delete();
    }

    public function updateOrigin($where, $data)
    {
        return $this->where($where)->save($data);
    }
}

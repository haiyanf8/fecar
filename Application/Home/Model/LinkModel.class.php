<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： LinkModel.class.php 
* 摘    要： 友情链接模型
* 作    者： 肖庆平
* 修改日期:　2016.6.30
*/
namespace Home\Model;
use Think\Model;

class LinkModel extends Model
{
    public function getLinks($field, $order, $limit)
    {
        return $this->field($field)->order($order)->limit($limit)->select();
    }

    public function insertLink($data)
    {
        return $this->add($data);
    }

    public function deleteLink($where)
    {
        return $this->where($where)->delete();
    }

    public function updateLink($where, $data)
    {
        return $this->where($where)->save($data);
    }
}

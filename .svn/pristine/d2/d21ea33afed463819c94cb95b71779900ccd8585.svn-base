<?php
namespace Home\Model;
use Think\Model;

class ValuateappointModel extends Model
{
    public function getRecords($where, $field, $order, $limit)
    {
        return $this->where($where)->field($field)->order($order)->limit($limit)->select();
    }

    public function insertRecords($data)
    {
        return $this->add($data);
    }
}

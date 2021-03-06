<?php
namespace Home\Model;
use Think\Model;

class ValuaterecordModel extends Model
{
    public function getRecords($where, $field, $order, $limit)
    {
        return $this->where($where)->field($field)->order($order)->limit($limit)->select();
    }

    public function insertRecords($data)
    {
        return $this->add($data);
    }

    public function getRandRecords()
    {
        $where = '';
        $field = '`url`, `title`';
        $order = 'rand()';
        $limit = '0, 18';

        return $this->getRecords($where, $field, $order, $limit);
    }
}

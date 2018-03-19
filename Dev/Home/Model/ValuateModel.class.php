<?php
namespace Home\Model;
use Think\Model;

class ValuateModel extends Model
{
    public function getCount()
    {
        return $this->field('`count`')->select();
    }

    public function addCount()
    {
        return $this->where('1')->setInc('count', 1);
    }
}

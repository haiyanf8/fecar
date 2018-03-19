<?php
namespace Home\Model;
use Think\Model;

class ArticlePicModel extends Model
{
    public function getAll()
    {
        return $this->where('')->select();
    }

    public function getPic($where, $field)
    {
        return $this->where($where)->field($field)->select();
    }
}

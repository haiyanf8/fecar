<?php
namespace Home\Model;
use Think\Model;

class CategoryModel extends Model
{
    public function getCategories($where, $field, $order)
    {
        return $this->where($where)->field($field)->order($order)->select();
    }

    public function insertCategory($data)
    {
        return $this->add($data);
    }

    public function updateCategory($where, $data)
    {
        return $this->where($where)->save($data);
    }

    public function deleteCategory($where)
    {
        return $this->where($where)->delete();
    }
}

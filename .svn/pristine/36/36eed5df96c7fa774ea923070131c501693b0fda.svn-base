<?php
namespace Home\Model;
use Think\Model;

class SeoModel extends Model
{
    public function getSeoByIdent($ident)
    {
        $where['ident'] = $ident;
        $field = '`title`, `keywords`, `description`';
        return $this->where($where)->field($field)->select();
    }
}

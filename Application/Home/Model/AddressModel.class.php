<?php
namespace Home\Model;
use Think\Model;

class AddressModel extends Model
{
    /**
     * 获取门店信息
     */
    public function getStoreInfo()
    {
        return $this->alias('a')
                    ->join('left join fecar_city c on a.cityid = c.id')
                    ->where("a.open='1' and c.id is not null")
                    ->field('c.city, c.pinyin, a.storename, a.address, a.image')
                    ->order('a.priority desc')
                    ->select();
    }

    /**
     * 获取门店坐标
     */
    public function getStoreCoord($city)
    {
        return $this->alias('a')
                    ->join('left join fecar_city c on a.cityid = c.id')
                    ->where("a.open='1' and c.pinyin='$city'")
                    ->field('a.lot, a.lat')
                    ->select();
    }
}

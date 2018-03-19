<?php
namespace Home\Model;
use Think\Model;

class GpjcityModel extends Model
{
    public function getProvinces()
    {
        $where = '';
        $field = 'distinct province';
        return $this->where($where)->field($field)->select();
    }

    public function getCitiesByProvince($province)
    {
        $where['province'] = $province;
        $field = 'city, zipcode';

        return $this->where($where)->field($field)->select();
    }

    public function getCities($where, $order='')
    {
        $field = 'city, pinyin, zipcode';

        return $this->where($where)->field($field)->order($order)->select();
    }

    public function getCityByZipcode($zipcode)
    {
        $where['zipcode'] = $zipcode;
        $field = '`city`';

        return $this->where($where)->select();
    }
}

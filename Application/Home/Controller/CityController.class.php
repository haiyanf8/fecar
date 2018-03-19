<?php
namespace Home\Controller;
use Think\Controller;

class CityController extends Controller
{
    public function province()
    {
        $provinces = D('gpjcity')->getProvinces();
        echo json_encode($provinces);
    }

    public function city()
    {
        if (I('province')) {
            $city = D('gpjcity')->getCitiesByProvince(I('province'));
        } else {
            $where = '';
            $city = D('gpjcity')->getCities($where);
        }

        echo json_encode($city);
    }

    public function open()
    {
        $ret = array();

        $alpha = array('Z', 'Y', 'X', 'W', 'V', 'U', 'T', 'S', 'R', 'Q', 'P',
                    'O', 'N', 'M', 'L', 'K', 'J', 'I', 'H', 'G', 'F', 'E', 'D',
                    'C', 'B', 'A');
        foreach ($alpha as $value) {
            $ret = array_merge(array($value => array()), $ret);
        }

        $ret = array_merge(array('热门' => array()), $ret);
        $where['open'] = '1';
        $hotcity = D('gpjcity')->getCities($where, 'rank desc');
        $ret['热门'] = $hotcity;

        $all = D('gpjcity')->getCities('');
        foreach ($all as $value) {
                if ($this->getFirstCharter($value['city'])) {
                    array_push($ret[$this->getFirstCharter($value['city'])], array("city" => $value["city"], "zipcode" => $value["zipcode"]));
                } else if ($value['city'] == '泸州' || $value['city'] == '漯河') {
                    array_push($ret['L'], array("city" => $value["city"], "zipcode" => $value["zipcode"]));
                } else if ($value['city'] == '亳州') {
                    array_push($ret['H'], array("city" => $value["city"], "zipcode" => $value["zipcode"]));
                } else if ($value['city'] == '濮阳') {
                    array_push($ret['P'], array("city" => $value["city"], "zipcode" => $value["zipcode"]));
                } else if ($value['city'] == '衢州') {
                    array_push($ret['Q'], array("city" => $value["city"], "zipcode" => $value["zipcode"]));
                }
        }

        foreach ($ret as $key => $value) {
            if (count($ret[$key]) == 0) {
                unset($ret[$key]);
            }
        }

        echo json_encode($ret);
    }

    private function getFirstCharter($str)
    {
        if(empty($str)) {
            return '';
        }

        $fchar = ord($str{0});

        if($fchar >= ord('A') && $fchar <= ord('z')) {
            return strtoupper($str{0});
        } 

        $s1 = iconv('UTF-8', 'gb2312', $str);
        $s2 = iconv('gb2312', 'UTF-8', $s1);
        $s = ($s2 == $str) ? $s1 : $str;

        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if($asc >= -20319 && $asc <= -20284) {
            return 'A';
        }
        if($asc >= -20283 && $asc <= -19776) {
            return 'B';
        }
        if($asc >= -19775 && $asc <= -19219) {
            return 'C';
        }
        if($asc >= -19218 && $asc <= -18711) {
            return 'D';
        }
        if($asc >= -18710 && $asc <= -18527) {
            return 'E';
        }
        if($asc >= -18526 && $asc <= -18240) {
            return 'F';
        }
        if($asc >= -18239 && $asc <= -17923) {
            return 'G';
        }
        if($asc >= -17922 && $asc <= -17418) {
            return 'H';
        }
        if($asc >= -17417 && $asc <= -16475) {
            return 'J';
        }
        if($asc >= -16474 && $asc <= -16213) {
            return 'K';
        }
        if($asc >= -16212 && $asc <= -15641) {
            return 'L';
        }
        if($asc >= -15640 && $asc <= -15166) {
            return 'M';
        }
        if($asc >= -15165 && $asc <= -14923) {
            return 'N';
        }
        if($asc >= -14922 && $asc <= -14915) {
            return 'O';
        }
        if($asc >= -14914 && $asc <= -14631) {
            return 'P';
        }
        if($asc >= -14630 && $asc <= -14150) {
            return 'Q';
        }
        if($asc >= -14149 && $asc <= -14091) {
            return 'R';
        }
        if($asc >= -14090 && $asc <= -13319) {
            return 'S';
        }
        if($asc >= -13318 && $asc <= -12839) {
            return 'T';
        }
        if($asc >= -12838 && $asc <= -12557) {
            return 'W';
        }
        if($asc >= -12556 && $asc <= -11848) {
            return 'X';
        }
        if($asc >= -11847 && $asc <= -11056) {
            return 'Y';
        }
        if($asc >= -11055 && $asc <= -10247) {
            return 'Z';
        }

        return null;
    }

}

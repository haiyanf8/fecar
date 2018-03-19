<?php
namespace Home\Controller;
use Think\Controller;

class CarmodelController extends Controller
{
    public function brand()
    {
        $brandList = D('carmodel')->getCarBrand();

        $retList = array();
        $alpha = array('Z', 'Y', 'X', 'W', 'V', 'U', 'T', 'S', 'R', 'Q', 'P',
                    'O', 'N', 'M', 'L', 'K', 'J', 'I', 'H', 'G', 'F', 'E', 'D',
                    'C', 'B', 'A');
        foreach ($alpha as $value) {
            $retList = array_merge(array($value => array()), $retList);
        }

        foreach ($brandList as $value) {
            if ($value['brandname'] == '讴歌') {
                array_push($retList['O'], array("id" => $value["brandid"], "name" => $value["brandname"]));
            } else {
                array_push($retList[$this->getFirstCharter($value['brandname'])], array("id" => $value["brandid"], "name" => $value["brandname"]));
            }
        }

        foreach ($retList as $key => $value) {
            if (count($retList[$key]) == 0) {
                unset($retList[$key]);
            }
        }

        echo json_encode($retList);
    }

    public function series()
    {
        if (I('id')) {
            $brandid = I('id');
        } else {
            return;
        }

        $retList = array();
        $seriesList = D('carmodel')->getCarSeries($brandid);
        foreach ($seriesList as $value) {
            $retList = array_merge(array($value['manufacturer'] => array()), $retList);
        }

        foreach ($seriesList as $value) {
            array_push($retList[$value['manufacturer']], array("id" => $value['modelid'], "name" => $value['modelname']));
        }

        echo json_encode($retList);
    }

    public function model()
    {
        if (I('id')) {
            $series = I('id');
        } else {
            return;
        }

        $retList = array();
        $modelList = D('carmodel')->getCarModel($series);
        foreach ($modelList as $value) {
            $retList = array_merge(array($value['styleyear'] . ' 款' => array()), $retList);
        }

        foreach ($modelList as $value) {
            if ($value['outyear'] == '') {
                $value['outyear'] = date('Y');
            }
            array_push($retList[$value['styleyear'] . ' 款'], array('id' => $value['styleid'], 'name' => $value['stylename'],
                 'min_year' => $value['inyear'], 'max_year' => $value['outyear']));
        }

        echo json_encode($retList);
    }

    public function year()
    {
        if (I('id')) {
            $styleid = I('id');
        } else {
            return;
        }

        $styleList = D('carmodel')->getYear($styleid);
        if ($styleList[0]['outyear'] == '') {
            $styleList[0]['outyear'] = date('Y');
        }
        $retArr = array('min_year' => $styleList[0]['inyear'], 'max_year' => $styleList[0]['outyear']);

        echo json_encode($retArr);
    }

    //public function 

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

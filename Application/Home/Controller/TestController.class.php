<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Util\Page;
class TestController extends Controller {

    public function index(){
        //echo 'sadfaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $this->display();
    }

    public function test(){
        $where['auction.win_price'] = array('GT',100000);
        $bidedData = D('auction')->getHisSellDataList($where, 'auction.create_time desc,bid_times desc', '20', 0);
        print_r($bidedData);
    }

    public function getBrand(){
        echo json_encode(cur_brand());
    }

    public function getSeries(){
        $id=I('brandId');
        echo json_encode(cur_series($id));
    }

    public function getModel(){
        $id=I('seriesId');
        echo json_encode(cur_model($id));
    }

    public function getCity(){
        $type=I('type');
        echo json_encode(cur_cities($type));
    }

    public function getAssess(){
        $data=array('modelId'=>I('modelId'),'regDate'=>I('regDate'),'mile'=>I('mile'),'zone'=>I('zone'));
        echo cur_CarPrice($data);
    }

    public function getActiveAwards(){
        $data=array(
            'status'=>1,
            'awards'=>rand(0,5)
        );

        echo json_encode($data);
    }
    public function testSubmit(){
        $url = "http://test.www.fecar.com/Index/insert";
        echo cur_post($url, array('tel'=>I('tel'), 'city'=>I('opencity')));
    }
   public function kkk()
    {
           $url="http://test.www.fecar.com/Consult/insert";
           echo  cur_post($url,array('sex'=>I('sex'),'name'=>I('name'),'tel'=>I('tel'),'ask'=>I('ask')));
    }
}

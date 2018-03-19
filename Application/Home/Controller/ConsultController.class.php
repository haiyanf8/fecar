<?php
/**
* Copyright (c) 2016, 福建迈迈车网
* All rights reserved.
* 文件名称： ConsultController.class.php 
* 摘    要： 在线咨询控制器
* 作    者： 肖庆平(xiaoqingping@qq.com)
* 修改日期:　2016.6.23
*/
namespace Home\Controller;
use Common\Common\Util\Page;
class ConsultController extends BaseController
{
    private $_model = null;

    public function __construct()
    {
        parent::__construct();
        $this->_model = D('consult');
    }
    /**
     * 新增咨询条目
     */
    public function insert()
    {
        $data["mobile"] = I("tel");
        if (!$data["mobile"]) {
            echo json_encode(array('status' => 1, 'msg' => '请输入正确的手机号码'));
            return;
        }
        if (!checkTel(trim($data['mobile']))) {
            echo json_encode(array('status' => 2, 'msg' => '请输入正确的手机号码'));
            return;
        }
        $data["name"] = I("name");
        $data["sex"] = I("sex");
        $data["ask-time"] = date('Y-m-d H:i:s', time());
        $data["ask"] = I("ask");
        $data["answer"] = "";
        $data["verify"] = 0;

        $result = $this->_model->insertConsult($data);
        if ($result) {
            echo json_encode(array('status' => 0));
        } else {
            echo json_encode(array('status' => 2, 'msg' => '数据提交失败'));
        }
    }

    /**
     * 将咨询设置为已审核的状态
     */
    public function verify()
    {
        $where['id'] = I("id");
        $this->_model->verifyConsult($where);
    }

    /**
     * 删除咨询条目
     */
    public function delete()
    {
        $where['id'] = I("id");
        $this->_model->deleteConsult($where);
    }
}

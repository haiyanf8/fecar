<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller
{
    public function _empty()
    {
        $the_host = $_SERVER['HTTP_HOST'];
        header('Location:http://'.$the_host);
        return ;
    }
}

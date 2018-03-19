<?php
include "Taobao/TopSdk.php";

session_start();

$_uuid = session_id();
$_password = md5(md5($_uuid));
$_nick = $_SERVER["HTTP_CLIENT_IP"];

$client = new TopClient;
$client->appkey = '23464259';
$client->secretKey = '04eb67d1f026678e0e4468c7f9c71703';

$getReq = new OpenimUsersGetRequest;
$getReq->setUserids($_uuid);
$getResp = $client->execute($getReq);

$getRespArr = json_decode(json_encode($getResp), TRUE);

if (array_key_exists("error_response", $getRespArr)) {
    if ($getRespArr['error_response']['sub_code'] == 'isv.invalid-parameter') {
        echo json_encode(array("code" => 400, "msg" => $getRespArr['error_response']['sub_msg']));
        exit;
    } else if ($getRespArr['error_response']['sub_code'] == 'isp.service-error') {
        echo json_encode(array("code" => 500, "msg" => $getRespArr['error_response']['sub_msg']));
        exit;
    }
} else {
    if (array_key_exists('userinfos', $getRespArr['userinfos'])) {
        echo json_encode(array("code" => 200, 'status' => 1 , 'msg' => '用户已存在', "data" => array("key" => $client->appkey, "touid" => "迈迈车001001", "userid" => $_uuid, "password" => $_password)));
    } else {
        $req = new OpenimUsersAddRequest;
        $userinfos = new Userinfos;
        $userinfos->userid = $_uuid;
        $userinfos->password = $_password;
        $userinfos->nick = $_nick;

        $req->setUserinfos(json_encode($userinfos));
        $resp = $client->execute($req);

        echo json_encode(array("code" => 200, 'status' => 0, 'msg' => '新用户', "data" => array("key" => $client->appkey, "touid" => "迈迈车001001", "userid" => $_uuid, "password" => $_password)));
    }
}



<?php
/**
 * 全局公共函数库
 *
 * @author 何建华
 * @qq 55771237
 * @version  2016-04-07
 * @copyright fecar
 */



/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function cutString($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}

function sub_str($str, $length = 0, $append = '...') {
    $str = trim($str);
    $strlength = strlen($str);
    if ($length == 0 || $length >= $strlength) {
        return $str;
    } elseif ($length < 0) {
        $length = $strlength + $length;
        if ($length < 0) {
            $length = $strlength;
        }
    }
    if ( function_exists('mb_substr') ) {
        $newstr = mb_substr($str, 0, $length, 'utf-8');
    } elseif ( function_exists('iconv_substr') ) {
        $newstr = iconv_substr($str, 0, $length, 'utf-8');
    } else {
        //$newstr = trim_right(substr($str, 0, $length));
        $newstr = substr($str, 0, $length);
    }
    if ($append && $str != $newstr) {
        $newstr .= $append;
    }
    return $newstr;
}

function abslength($str)
{
    
    if(empty($str)){
        return 0;
    }
    $str = trim($str);
    if(function_exists('mb_strlen')){
        return mb_strlen($str,'utf-8');
    }
    else {
        preg_match_all("/./u", $str, $ar);
        return count($ar[0]);
    }
}
/**
 * 生成随机字符串
 * @param number $length 字符串长度
 * @param number $type 字符串类型
 * @return string
 */
function randomString($length, $type = 0) {
	$arr  = array(
			0 => '123456789',
			1 => 'abcdefghjkmnpqrstuxy',
			2 => 'ABCDEFGHJKMNPQRSTUXY',
			3 => '123456789abcdefghjkmnpqrstuxy',
			4 => '123456789ABCDEFGHJKMNPQRSTUXY',
			5 => 'abcdefghjkmnpqrstuxyABCDEFGHJKMNPQRSTUXY',
			6 => '123456789abcdefghjkmnpqrstuxyABCDEFGHJKMNPQRSTUXY',
			7 => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	);
	
	$chars = $arr[$type] ? $arr[$type] : $arr[7];
	$hash  = '';
	$max   = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

function checkTel($tel){
    $pattern = "/^(1([38]{1}[0-9]{1}|5[0-35-9]|4[57]|7[06-8]{1})[0-9]{8})$/";
    //$pattern="/^(134|135|136|137|138|139|150|151|152|158|159|157|182|183|187|188|147|130|131|132|155|156|185|186|133|153|180|189){1}[0-9]{8}$/";
    $res=preg_match($pattern, $tel);
    if($res){
        return true;
    }else{
        return false;
    }
}

function cur_post($url,$data=null){
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, true);
    if($data){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    //执行并获取HTML文档内容
    $output = curl_exec($ch);

    //释放curl句柄
    curl_close($ch);
    return $output;
}

function cur_get($url, $header = null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if ($header) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

    //执行并获取HTML文档内容
    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}

/**
 * is_mobile
 * @return boolean
 */
function is_mobile()
{
    static $is_mobile;

    if( isset($is_mobile))
        return $is_mobile;

    if( empty($_SERVER['HTTP_USER_AGENT'])){
        $is_mobile =false;
    }
    else if ( strpos($_SERVER['HTTP_USER_AGENT'],'Mobile')!==false
    || strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false
    || strpos($_SERVER['HTTP_USER_AGENT'],'Silk/')!==false
    || strpos($_SERVER['HTTP_USER_AGENT'],'Kindle')!==false
    || strpos($_SERVER['HTTP_USER_AGENT'],'BlackBerry')!==false
    || strpos($_SERVER['HTTP_USER_AGENT'],'Opera Mini')!==false){
        $is_mobile =true;
    }else{
        $is_mobile =false;
    }

    return $is_mobile;
}


function get_page_url()
{
    $url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
    $url .= $_SERVER['HTTP_HOST'];
    $url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
    return $url;
}

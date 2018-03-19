<?php
	$the_host = $_SERVER['HTTP_HOST'];//取得当前域名
	
	$the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';//判断地址后面部分
	
	$the_url = strtolower($the_url);//将英文字母转成小写
    
	if($the_host == 'fecar.com' || $the_host == 'fecar.cn'){
	    $newurl='www.fecar.com';
	    header('HTTP/1.1 301 Moved Permanently');//发出301头部
	    
	    header('Location:http://www.fecar.com'.$the_url);//跳转到带www的网址 http://test.www.fecar.com/
	}else{
	    if(strpos($the_host, 'fecar.cn')){
	        $the_url_arr = explode('.', $the_host);
	         
	        // $the_url_arr = array_filter($the_url_arr);
	        $the_url_arr_count = count($the_url_arr);
	        if($the_url_arr_count == 4){
	            header('HTTP/1.1 301 Moved Permanently');//发出301头部
	            header('Location:http://test.www.fecar.com'.$the_url);//跳转到带www的网址
	        }else{
	            header('HTTP/1.1 301 Moved Permanently');//发出301头部
	             
	            header('Location:http://www.fecar.com'.$the_url);//跳转到带www的网址 http://test.www.fecar.com/
	        }
	    }
	}
	//echo $newurl;exit();
	//header('HTTP/1.1 301 Moved Permanently');//发出301头部
		
	//header('Location:http://'.$newurl.$the_url);//跳转到带www的网址

	/* if($the_host !== 'www.fecar.com')//如果域名不是带www的网址那么进行下面的301跳转
	
	{
	
		header('HTTP/1.1 301 Moved Permanently');//发出301头部
	
		header('Location:http://www.fecar.com'.$the_url);//跳转到带www的网址 http://test.www.fecar.com/
	
	} */

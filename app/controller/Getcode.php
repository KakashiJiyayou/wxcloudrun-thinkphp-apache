<?php

namespace app\controller;

use Error;
use Exception;
use app\model\Counters;
use think\response\Html;
use think\response\Json;
use think\facade\Log;

class Getcode {


	public function make_curl_call($url)
	{
		$ch = curl_init();
		//设置超时
		
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//运行curl，结果以jason形式返回
		$res = json_decode( curl_exec($ch));
		curl_close($ch);
		
		if($res->openid != null)
        	return  $res->openid ;
		else 
		return $res;
	}

    private function get_opendata()
	{

	}

	public function get_open_id()
	{
		
		$head = getallheaders();
        // $body = json_decode(file_get_contents('php://input'),true);
        $openid = !empty($head['x-wx-openid']) ? $head['x-wx-openid'] : $head['X-WX-OPENID'];
		return $openid;
	}

    public function get_code($code){
        // $appId = "wxa6d55e3e5cb2a024";
        // $secret = "a3ad5bb4723c70dc66ecbc33e38325d7";
        // // echo $code;

        // $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $appId . "&secret=" . $secret . "&js_code=" . $code . "&grant_type=authorization_code";
        
		// $get_opein_ID =  $this->make_curl_call($url);
		// return $get_opein_ID;
		
		//取出openid
		// $data = json_decode($res,true);
		// echo $data;

		return $this->get_open_id();


    }

	
}
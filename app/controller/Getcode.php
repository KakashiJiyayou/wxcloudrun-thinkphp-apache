<?php

namespace app\controller;

use Error;
use Exception;
use app\model\Counters;
use think\response\Html;
use think\response\Json;
use think\facade\Log;

class Getcode {


	public function make_curl_call($url,$data){
	
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		$headers = array(
			"Content-Type: application/json",
		 );
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//retun json data
		$res = curl_exec($ch);
		curl_close($ch);
		
		
		return $res;
	}

    private function get_open($openid)
	{
		$url = "http://api.weixin.qq.com/wxa/getopendata";
		$data = `{"openid",$openid}`; 
		$data = $this->make_curl_call($url, $data);
		return $data;

	}

    public function get_code(){
		$head = getallheaders();
        $openid = !empty($head['x-wx-openid']) ? $head['x-wx-openid'] : $head['X-WX-OPENID'];
		// var_dump( $openid);
		// return $openid;
		// return $openid;
        // $appId = "wxa6d55e3e5cb2a024";
        // $secret = "a3ad5bb4723c70dc66ecbc33e38325d7";
        // // echo $code;

        // $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $appId . "&secret=" . $secret . "&js_code=" . $code . "&grant_type=authorization_code";
        
		// $get_opein_ID =  $this->make_curl_call($url);
		// return $get_opein_ID;
		
		//取出openid
		// $data = json_decode($res,true);
		// echo $data;

		$get_opendata	= $this->get_open($openid);
		return $get_opendata;


    }

	
}
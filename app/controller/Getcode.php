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
		
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//retun json data
		$res = json_decode( curl_exec($ch));
		curl_close($ch);
		
		
		return $res;
	}

    private function get_opendata($openid)
	{
		$url = "http://api.weixin.qq.com/wxa/getopendata?openid=$openid";
		$data = $this->make_curl_call($url);
		return $data;

	}

    public function get_code(){
		$head = getallheaders();
        $openid = !empty($head['x-wx-openid']) ? $head['x-wx-openid'] : $head['X-WX-OPENID'];
		return $openid;
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

		// $get_opendata	= $this->get_opendata($openid);
		// return $get_opendata;


    }

	
}
<?php

namespace app\controller;

use Error;
use Exception;
use app\model\Counters;
use think\response\Html;
use think\response\Json;
use think\facade\Log;
 
class Getid {

    public function get_code(){
        $head = getallheaders();
        // $body = json_decode(file_get_contents('php://input'),true);
        $openid = !empty($head['x-wx-openid']) ? $head['x-wx-openid'] : $head['X-WX-OPENID'];

        echo $openid;
    }
}
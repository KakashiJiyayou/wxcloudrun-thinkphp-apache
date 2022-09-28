<?php

namespace app\controller;
use think\facade\Db;
use app\BaseController;
use Error;
use Exception;
use app\model\Counters;
use think\response\Html;
use think\response\Json;
use think\facade\Log;

class Saveandgetinfo { 

    /**
     * helps to get the post header and data body
     */
    public function get_openid()
    {
        $head   = getallheaders();
        $openid = !empty($head['x-wx-openid']) ? $head['x-wx-openid'] : $head['X-WX-OPENID'];
        // returning values got from POST header and body part from USER MINI app
		return $openid;
    }

    /**
     * get body
     */
    public function get_body()
    {
        $body   = json_decode(file_get_contents('php://input'),true);
        return $body;
    }


    /**
     * function to save user information
     */
    public function save_user_information()
    {

        $openid = $this->get_openid() ;
        $data   = $this->get_body()["userinfo"];
    
        // return json([
        //     	"openid"=> $openid ,
        //     	"body"=> $data,
        //     ]);

        // // // if values already exists it will give greater than '0' value
        $value      =   DB::table("userinfo")->where("union_id",$openid)->count();


        if($value>0)
        {
            
        }
        else
        {
            $this->create_new_user($openid, $data);
        }
        
    }


    /**
     * create new user 
     */
    public function create_new_user($openid, $body)
    {
        $data= 
        [
            "user_name" =>  $body->name,
            "union_id"  =>  $openid,
            "avatar"    =>  $body->avatarUrl
        ];
        $rs=Db::name('userinfo')->save($data);

        return json(['code'=>200,'data'=>$rs]);
    }

}

<?php
namespace app\controller;
use think\facade\Db;

class Practicedb

{

    public function query_data()
    {
        $value      =   DB::name("userinfo")->where("union_id","30A99587ACB1C25F88B671FE19492B8A&id30A99587ACB1C25F88B671FE19492B8A&id30A99587ACB1C25F88B671FE19492B8A&id")->count();

        return $value;
    }

    public function save_data()
    {
        $data= 
        [
            "user_name" =>  "name",
            "union_id"  =>  "openid",
            "avatar"    =>  "avatarUrl"
        ];
        $rs=Db::name('userinfo')->save($data);

        return json(['code'=>200,'data'=>$rs]);
    }

    public function simple_crud()
    {
        $data= 
        [
            "user_name" =>  "name",
            "union_id"  =>  "testing usinio ID 1",
            "avatar"    =>  "avatarUrl"
        ];

         $res = DB::name("userinfo")->insert($data);
         printf("add data ". $res);

         $res = DB::name("userinfo")->select();
         printf("query data ".$res);

         $res = DB::name("userinfo")
                ->where("union_id", "testing usinio ID 1")
                ->update([
                    "union_id"  =>  "xxx56",
                    "avatar"    =>  "avatarUrl"]);

        $res = DB::name("userinfo")->select();
        printf("query data ".$res);

        $res = Db::table('userinfo')
                ->where('union_id','xxx56')->delete();
        printf("delete data ".$res);

        $res = DB::name("userinfo")->select();
        printf("query data ".$res);




    }


}
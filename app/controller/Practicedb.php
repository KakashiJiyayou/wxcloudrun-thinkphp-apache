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


}
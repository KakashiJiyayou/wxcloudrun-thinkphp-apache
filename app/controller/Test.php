<?php
// +----------------------------------------------------------------------
// | 文件: index.php
// +----------------------------------------------------------------------
// | 功能: 提供todo api接口
// +----------------------------------------------------------------------
// | 时间: 2021-11-15 16:20
// +----------------------------------------------------------------------
// | 作者: rangangwei<gangweiran@tencent.com>
// +----------------------------------------------------------------------

namespace app\controller;

use Error;
use Exception;
use app\model\Counters;
use think\response\Html;
use think\response\Json;
use think\facade\Log;

class Test
{

    public function test()
    {
        return "hello";
    }

    public function banner(){
        return response(file_get_contents(dirname(dirname(__FILE__)).'../../public/uploads/json/home/banner1.json'));
        // return response(file_get_contents(dirname(dirname(__FILE__)).'/view/banner1.json')); 

        // return response(file_get_contents(dirname(dirname(__FILE__)).'/view/index.html'));
    }

    public function home_product(){
        return response(file_get_contents(dirname(dirname(__FILE__)).'../../public/uploads/json/product/product.json'));
    }

    public function home_brand(){
        return response(file_get_contents(dirname(dirname(__FILE__)).'../../public/uploads/json/product/brand_home.json'));
    }

    public function home_product_type(){
        return response(file_get_contents(dirname(dirname(__FILE__)).'../../public/uploads/json/product/type.json'));
    }
}

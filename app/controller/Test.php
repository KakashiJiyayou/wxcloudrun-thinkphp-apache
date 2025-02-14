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

    public function product_buy_sku($product_id){
        return response(file_get_contents(dirname(dirname(__FILE__))."../../public/uploads/json/product_sku/$product_id.json"));
    }


    public function get_share_goods_json(){
        return response(file_get_contents(dirname(dirname(__FILE__))."../../public/uploads/json/share_goods/sharegoods.json"));
    }

    /**
     * 
     * @param get {product_id}
     * @return {single product}
     */
    public function product_get_info($product_id){
        $value = json_decode(file_get_contents(dirname(dirname(__FILE__))."../../public/uploads/json/product/product.json"));
        // var_dump($value->data);
        foreach($value->data as $index){
            if(isset($index->product_id)){
                if(strcmp($index->product_id, $product_id)==0){
                    $data =$index;
                    header('Content-type: application/json');
                    echo json_encode( $data ,JSON_PRETTY_PRINT);
                    break;
                }
            }
        }
    }


    /**
     * 
     * @param get {product_id}
     * @param get {user_id}
     * @return one {sharegoods object}
     */
    public function get_sharegoods_buy_info($product_id, $user_id){
        $value = json_decode(file_get_contents(dirname(dirname(__FILE__))."../../public/uploads/json/share_goods/sharegoods.json"));
        // var_dump($value->data);
        foreach($value->data as $index){
            if(isset($index->product_id) && isset($index->user_id)){
                if( 
                    strcmp( $index->product_id, $product_id )==0  && /*compare product id*/
                    strcmp( $index->user_id,    $user_id) == 0    
                ){
                    $data =$index;
                    header('Content-type: application/json');
                    echo json_encode( $data ,JSON_PRETTY_PRINT);
                    break;
                }
            }
        }
    }


    /**save json  */
    public function test_save_json()
    {
        $value = file_get_contents(dirname(dirname(__FILE__))."../../public/uploads/json/share_goods/sharegoods.json");
        $dir = dirname(dirname(__FILE__))."../../public/uploads/tests";
        $myfile = fopen("$dir/data.json", "w");
        fwrite($myfile, $value);
        fclose($myfile); 
    }

    /**
     * testing saving image from the pos call 
     */

    public function test_post_image()
    {
        $dir = dirname(dirname(__FILE__))."../../public/uploads/tests/";
     
        // $files = request()->file('image');
        // echo "images ".$files ."     "   ;
        // echo "hello";

        // $trr = $_FILES['image']["name"];
        // echo "hi ".$trr;
        
        // $index = 0;
        // foreach($files as $file){
        //     if($file)
        //     {
        //         $info = $file->move($dir,$index ."name.png");

        //         if($info)
        //         {
        //             $img_src = $dir."/".$info;
        //             echo $img_src;
        //         }
        //         else{
        //             echo "error saving fiel";
        //         }
        //     }
        //     $index = $index + 1;
        // }
        
    }
    
}

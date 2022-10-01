<?php
declare (strict_types = 1);

namespace app\controller;
use think\facade\Db;

class Product{



    public function product($user_name)
    {     
        return "this is product"." ".$user_name;
    }


    /***below function will be used to save json data to the database */
    public function save_prosuct_json()
    {
        $product_json = file_get_contents(dirname(dirname(__FILE__)).'../../public/uploads/json/product/product.json');

        // echo $product_json;
        // echo "...<br>... first ";
        // var_dump($product_json);


        // echo "...<br>...third ";
        // $data = json_encode( $data->data);
        // var_dump($data);

        // echo "...<br>...fourth ";
        // $data = [
        //     "product_id"=> "00012afds",
        //     "src" =>"https://rider1-2156191-1312445728.ap-shanghai.run.tcloudbase.com/uploads/img/product/p1.jpg",
        //     "title" => "egger",
        //     "desc" => "It's a home made sweet delicacy that will make your mouth watery ",
        //     "price"  => 50,
        //     "hot" =>false,
        //     "brand_name" => "coco",
        //     "brand_id"  =>"b1",
        //     "type"  => "snacks"
        // ];
        // var_dump($data);

        // echo "...<br>...fourth ";
        // $rs=Db::name('product_info')->save($data);
        
        // echo "...<br>...<br> result ".$rs;

        
        echo "...<br>... deocde value";
        $data = json_decode($product_json);
        var_dump($data);

        $data = $data->data;
        foreach($data as $value)
        {
            $array = json_decode(json_encode($value), true);
            echo "<br> json_decode(json_encode(value)=";
            var_dump($array);
            $rs=Db::name('product_info')->save($array);
            echo "...<br>...<br> result ".$rs;
            
        }

    }

  
}

?>
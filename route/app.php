<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// 获取当前计数
// Route::get('/api/count', 'index/getCount');

// // 更新计数，自增或者清零
// Route::post('/api/count', 'index/updateCount');


//           //url path        //controller_name/function
Route::get ("/api/get_banner",'test/banner');

Route::get ("/api/get_home_product",'test/home_product');

Route::get ("/api/get_home_brand",'test/home_brand');

Route::get ("/api/get_home_product_type",'test/home_product_type');




 
Route::get("/api/get_user_id", "getid/get_code");



//get share goods json file
Route::get("/api/get_share_goods_jason","test/get_share_goods_json");


/**
 * section to get data , by giving a parameter
 */
Route::get("/api/get_user_login", "getcode/get_code");

Route::get ("/api/get_poduct_buy_sku/:product_id",'test/product_buy_sku');

Route::get ("/api/get_product_info/:product_id",'test/product_get_info');

Route::get("/api/get_sharegoods_buy_info/:product_id/:user_id", 'test/get_sharegoods_buy_info');



/**
 * just for testing
 */
// while passing values
//  
Route::post("/logouts/:user_id",     "logout/show");
Route::get("/logout/user_id",       "logout/show2");
Route::get("/dashboard/:user_name", "dashboard/dashboard");
Route::get("/nazmulshuvo/:user_name", "nazmulshuvo/dashboard");
Route::get("/product/:user_name", "product/product");
// Route::get("/product", "product/call");



// Route::get("dashboards/:user_name","dashboard/username");


// delete later
Route::get("/logout", "logout/callme");

// Route::get("/product", "product/callme");


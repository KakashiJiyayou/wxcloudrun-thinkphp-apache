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


Route::post("/api/get_user_login", "getcode/get_code");


//get share goods json file
Route::get("/api/get_share_goods_jason","test/get_share_goods_json");


/**
 * section to get data , by giving a parameter
 */

Route::get ("/api/get_poduct_buy_sku/:product_id",'test/product_buy_sku');

Route::get ("/api/get_product_info/:product_id",'test/product_get_info');

Route::get("/api/get_sharegoods_buy_info/:product_id/:user_id", 'test/get_sharegoods_buy_info');



/************************************************************** *
                    DATABASE                
*************************************************************** */

// save user information
// if user does not exits it will create new user
Route::post("/api/save/userinformation", "saveandgetinfo/save_user_information");

// saving brand information
Route::post("/api/save/brand_info", "saveandgetinfo/save_brand_info");



// practice
Route::get("/api/get/query/simple/db/query", "practicedb/query_data");
Route::get("/api/save", "practicedb/save_data");
Route::get("/api/do/crud", "practicedb/simple_crud");

// testing 
Route::post("/api/get/brand_info", "saveandgetinfo/get_brand_info");
/************************************************************** *
                    DATABASE                
*************************************************************** */


/**
 * just for testing
 */
// while passing values
//  
Route::get("/logouts/:user_id",     "logout/show");
Route::get("/logout/user_id",       "logout/show2");
Route::get("/dashboard/:user_name", "dashboard/dashboard");
Route::get("/nazmulshuvo/:user_name", "nazmulshuvo/dashboard");
Route::get("/product/:user_name", "product/product");

// save file in think php
Route::get("/api/test/save/jsonfile", "test/test_save_json");
Route::POST("/api/test/save/user_photo","test/test_post_image");

// Route::get("/product", "product/call");



// Route::get("dashboards/:user_name","dashboard/username");


// delete later
Route::get("/logout", "logout/callme");

// ** save product json
Route::get("/api/save_data/prodcut_json", "product/save_prosuct_json");



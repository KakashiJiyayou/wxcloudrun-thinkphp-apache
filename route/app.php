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

Route::get ("/api/get_poduct_buy_sku/:product_id",'test/product_buy_sku');

Route::get ("/api/get_product_info/:product_id",'test/product_get_info');

Route::get("/api/get_user_login/:code", "login/get_code");
 
Route::get("/api/get_user_id", "getid/get_code");


// while passing values
//  
Route::get("/logouts/:user_id","logout/show");
Route::get("/logout/user_id","logout/show2");


// delete later
Route::get("/logout", "logout/callme");

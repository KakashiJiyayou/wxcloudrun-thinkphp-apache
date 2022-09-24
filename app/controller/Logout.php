<?php
declare (strict_types = 1);

namespace app\controller;

class Logout
{
    public function callMe()
    {
        $ONE = "this is one";
        $one = "this is not one";
        return "hi everyone ".$ONE;
    }

    public function show($user_id)
    {
        // do soenm logical things here
        return  "Hi". $user_id;
    }

    public function show2()
    {
        // do soenm logical things here
        return  "Hi2";
    }
}

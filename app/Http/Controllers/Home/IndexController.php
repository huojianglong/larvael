<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //登录
    public function login()
    {
        return view('Home/Index/login');
    }

    //
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use function Sodium\compare;

class GoodsController extends Controller
{
    //判断是否登录
    public function isLogin()
    { Session::put('uid',3);
        //判断登录信息是否存在
        if (Session::get('uid'))
        {
            return $id = Session::get('uid');
        }else{
            return redirect(url('Home/Index/login'));
        }
    }
    //商品详情
    public function goodsInfo()
    {
        //[1=>'手袋单人份',2=>'礼盒双人份',3=>'全家福礼包']  手袋单人份;礼盒双人份;全家福礼包
        //[1=>'原味',2=>'奶油',3=>'炭烧',4=>'咸香']        原味;奶油;炭烧;咸香
        //接口
//        $product_id = Input::get('id');

        $product_id = Input::get('id');
        $rows = DB::table('goods')->where('id',$product_id)->first();
//        dd($rows);
        $taste = explode(';',$rows->taste);
        $taste_length = count($taste);
        $message = explode(';',$rows->info);
        $message_length = count($message);
//        dd(explode(';',$rows));
        $date = compact('rows','taste','message','taste_length','message_length');
//        dd($date);
        return view('Home/Goods/goods_info',$date);
    }

    //收藏
    public function collection(){
        $uid = $this->isLogin();
        if (isset($uid)){
            $rows = DB::table('collection as c')->join('goods as g','g.id','=','c.product_id')->where('uid',$uid)->get();
        }
//        dd($rows);
        $data = compact('rows');
        return view('Home/Goods/collection',$data);
    }

    //足迹
    public function goodsfoot(){
        $uid = $this->isLogin();
        if (isset($uid)){
            $rows = DB::table('history as h')->join('goods as g','g.id','=','h.product_id')->where('uid',$uid)->orderBy('time','desc')->get();
        }
        $data = compact('rows');
        return view('Home/Goods/goodsfoot' ,$data);
    }

    //足迹商品跳转商品详情
    public function footAction(){
        $id = Input::get('gid');

    }
}

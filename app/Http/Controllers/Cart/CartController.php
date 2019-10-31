<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;
use Session;

class CartController extends Controller
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
    //购物车主页面
    public function index()
    {
        //获取用户id
        $id =  $this->isLogin();
        //连表查询购物车商品信息
        $results = DB::select("select * from cart,goods where cart.product_id = goods.id and cart.uid = '{$id}'");
//        dd($results);
        return view('Home/Cart/index',['title'=>'购物车页面','rows'=>$results]);
    }

    //商品详情处理
    public function infoAction()
    {
        $uid = $this->isLogin();
        $product_id = Input::get('product_id');
        $product_num = Input::get('num');
        $taste = Input::get('taste');
        $array = explode(';',$taste);
        //查询当前用户是否存在该商品
        $row = DB::select("select id,product_num from cart where uid='{$uid}' and product_id = '{$product_id}'");
        if ($row){
            //用户购物车商品更新
            $id = $row[0]->id;
            $num = $product_num+$row[0]->product_num;
            $b = DB::table('cart')->where('id',$id)->update(['product_num'=>$num,]);
        }else{
            //新用户或用户添加新商品
            $b=DB::table('cart')->insertGetId(['uid'=>$uid,'product_id'=>$product_id,'product_num'=>$product_num,'product_taste'=>$array[1],'product_pack'=>$array[2]]);
        }
        if ($b){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        return response()->json($data);
    }

    //购物车处理
    public function indexAction()
    {
        if ( Input::get('product_num') && Input::get('product_id')) {
            //更新
            $prodcut_id = Input::get('product_id');
            $product_num = Input::get('product_num');
            DB::table('cart')->where('product_id', $prodcut_id)->update(['product_num' => $product_num]);
        }else {
            //删除
            $prod_id = Input::get('product_id');
            $bool = is_array($prod_id);
//            dd($bool);
            if ($bool){
                foreach ($prod_id as $v){
                    $id = $v;
                    if (isset($id) && ($id > 0)) {
                        DB::table('cart')->where('product_id', $id)->delete();
                    }
                }
            }else{

                if (isset($prod_id) && ($prod_id > 0)) {
                    DB::table('cart')->where('product_id', $prod_id)->delete();
                }
            }
        }
    }
    //结算处理
    public function cartAction(){
        $uid = $this->isLogin();
        $arr_id = Input::get('arr_id');
        $total = Input::get('total');
//        dd($arr_id);
        if (!empty($arr_id)){
            $rows = DB::table('cart')->join('goods','goods.id','=','cart.product_id')->where('uid',$uid)->whereIn('product_id',$arr_id)->get();
        }
        $data = compact('rows','total');
        return response()->json($data);
    }
    //订单界面
    public function pay(){

        $arr = Input::get('product_id');
        $uid =  $this->isLogin();
        $arr = explode(',',$arr);

        foreach ($arr as $v){
            if (!empty($v)){
                $data[] = DB::table('cart')->join('goods','cart.product_id','=','goods.id')
                                         ->where([['cart.uid', "{$uid}"] ,[ 'cart.product_id',"{$v}"]])
                                         ->select('*')
                                         ->get()->toArray();
            }
        }

        $date = compact('arr','data');
        return view('Home/Cart/pay',$date);
    }
}

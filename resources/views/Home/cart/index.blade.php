{{--@include(asset('cart.header'));--}}
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>{{$title}}</title>

    <link href="{{asset('AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/cartstyle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/optstyle.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('layui/layui.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
{{--    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>--}}


</head>

<body>

<!--顶部导航条 -->
<div class="am-container header">
    <ul class="message-l">
        <div class="topMessage">
            <div class="menu-hd">
                <a href="#" target="_top" class="h">亲，请登录</a>
                <a href="#" target="_top">免费注册</a>
            </div>
        </div>
    </ul>
    <ul class="message-r">
        <div class="topMessage home">
            <div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
        </div>
        <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd"><a id="mc-menu-hd" href="{{asset('Cart/index')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
        </div>
    </ul>
</div>

<!--悬浮搜索框-->

<div class="nav white">
    <div class="logo"><img src="{{asset('images/logo.png')}}" /></div>
    <div class="logoBig">
        <li><img src="{{asset('images/logobig.png')}}" /></li>
    </div>

    <div class="search-bar pr">
        <a name="index_none_header_sysc" href="#"></a>
        <form>
            <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
        </form>
    </div>
</div>

<div class="clear"></div>

<!--购物车 -->
<div class="concent">
    <div id="cartTable">
        <div class="cart-table-th">
            <div class="wp">
                <div class="th th-chk">
                    <div id="J_SelectAll1" class="select-all J_SelectAll">

                    </div>
                </div>
                <div class="th th-item">
                    <div class="td-inner">商品信息</div>
                </div>
                <div class="th th-price">
                    <div class="td-inner">单价</div>
                </div>
                <div class="th th-amount">
                    <div class="td-inner">数量</div>
                </div>
                <div class="th th-sum">
                    <div class="td-inner">金额</div>
                </div>
                <div class="th th-op">
                    <div class="td-inner">操作</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>


        <div class="clear"></div>
        @forelse($rows as $v)
        <tr class="item-list"  >
            <div class="bundle  bundle-last " id="tr_{{$v->product_id}}">
                <div class="bundle-hd">
                    <div class="bbundle  d-promos">
                        <div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
                        <div class="act-promo">
                            <a href="JavaScript:;" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
                        </div>
                        <span class="list-change theme-login">编辑</span>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="bundle-main">
                    <ul class="item-content clearfix">
                        <li class="td td-chk">
                            <div class="cart-checkbox ">
                                <input class="check" id="che_{{$v->product_id}}" aid="{{$v->product_id}}"
                                       name="items[]" value="170769542747" type="checkbox">

                                <label for="J_CheckBox_170769542747"></label>
                            </div>
                        </li>
                        <li class="td td-item">
                            <div class="item-pic">
                                <a href="{{url('Home/Goods/goodsInfo')}}?product_id={{$v->product_id}}" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
                                    <img src='{{asset("upload/$v->pic")}}' class="itempic J_ItemImg"></a>
                            </div>
                            <div class="item-info">
                                <div class="item-basic-info">
                                    <a href="{{url('Home/Goods/goodsInfo')}}?product_id={{$v->product_id}}" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->info}}</a>
                                </div>
                            </div>
                        </li>
                        <li class="td td-info">
                            <div class="item-props item-props-can">
                                <span class="sku-line">规格：{{$v->product_taste}}</span><br>
                                <span class="sku-line">包装：{{$v->product_pack}}</span>
{{--                                <span tabindex="0" class="btn-edit-sku theme-login">修改</span>--}}
                                <i class="theme-login am-icon-sort-desc"></i>
                            </div>
                        </li>
                        <li class="td td-price">
                            <div class="item-price price-promo-promo">
                                <div class="price-content">
                                    <div class="price-line">
                                        <em class="price-original">{{$v->old_price}}</em>
                                    </div>
                                    <div class="price-line">
                                        <em class="J_Price price-now" tabindex="0" id="pr_{{$v->product_id}}">{{$v->new_price}}</em>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="amount-wrapper ">
                                <div class="item-amount ">




                                    <div class="sl">
                                        <input class="min1 am-btn" name=""  type="button" value="-" onclick="acc({{$v->product_id}})" id="id-{{$v->product_id}}" />
                                        <input class="text_box" name=""  id="num_{{$v->product_id}}" type="text" value="{{$v->product_num}}" style="width:30px;" />
                                        <input class="add1 am-btn" name=""  type="button" value="+"  id="id_{{$v->product_id}}" onclick="add({{$v->product_id}})"/>
                                    </div>

                                </div>
                            </div>
                        </li>
                        <li class="td td-sum">
                            <div class="td-inner">
                                <em tabindex="0" class="J_ItemSum number" id="price_{{$v->product_id}}" >{{$v->product_num*$v->new_price}}</em>
                            </div>
                        </li>
                        <li class="td td-op">
                            <div class="td-inner">
                                <a title="移入收藏夹" class="btn-fav" href="#">
                                    移入收藏夹</a>
                                <a href="#" data-point-url="#" class="delete" onclick="del({{$v->product_id}})" >
                                    删除</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </tr>
        @empty
        <tr>
            <td colspan="5"> 购物车为空.... </td>
        </tr>
        @endforelse
    </div>
    <div class="clear"></div>

    <div class="float-bar-wrapper">
        <div id="J_SelectAll2" class="select-all J_SelectAll">
            <div class="cart-checkbox">
                <input class="check-all check0"  style="margin: 20px 5px"
                       id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
                <label for="J_SelectAllCbx2"></label>
            </div>
            <span id="span" >全选</span>
        </div>
        <div class="operations">
            <a href="#" hidefocus="true" class="deleteAll" onclick="delAll()">删除</a>
            <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
        </div>
        <div class="float-bar-right">
            <div class="amount-sum">
                <span class="txt">已选商品</span>
                <em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
                <div class="arrow-box">
                    <span class="selected-items-arrow"></span>
                    <span class="arrow"></span>
                </div>
            </div>
            <div class="price-sum">
                <span class="txt">合计:</span>
                <strong class="price">¥<em id="J_Total">0.00</em></strong>
            </div>
            <div class="btn-area">
                <a href="javascript:void(0)" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
                    <span>结&nbsp;算</span></a>
            </div>
        </div>

    </div>

    <div class="footer">
        <div class="footer-hd">
            <p>
                <a href="#">恒望科技</a>
                <b>|</b>
                <a href="#">商城首页</a>
                <b>|</b>
                <a href="#">支付宝</a>
                <b>|</b>
                <a href="#">物流</a>
            </p>
        </div>
        <div class="footer-bd">
            <p>
                <a href="#">关于恒望</a>
                <a href="#">合作伙伴</a>
                <a href="#">联系我们</a>
                <a href="#">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
            </p>
        </div>
    </div>

</div>

<!--操作页面-->

<div class="theme-popover-mask"></div>

<div class="theme-popover">
    <div class="theme-span"></div>
    <div class="theme-poptit h-title">
        <a href="javascript:;" title="关闭" class="close">×</a>
    </div>
    <div class="theme-popbod dform">
    </div>
</div>
<!--引导 -->
<div class="navCir">
    <li><a href="home2.html"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
    <li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
</body>
<script>
    //全选点击 全选 取消全选
    $('#J_SelectAllCbx2').click(function(){
        if($(this).prop('checked')){
            $("input[type='checkbox']").attr("checked",true);
            var n = 0;
            var m = true;
            var $price = 0;
            $('.check').each(function(){
                // console.log(66);
                if ($(this).is(':checked')){
                    n++;
                    var id = $(this).attr('aid');
                    $price += parseFloat($('#price_'+id).text());
                    // alert($price);
                }else{
                    m = false;
                    console.log(m);
                }
                //勾选商品总价
                $('#J_Total').text($price);
                //勾选商品数量
                $('#J_SelectedItemsCount').text(n);
                //商品全部勾选时 全选
                if (m){
                    $('#J_SelectAllCbx2').attr("checked",true);
                }else {
                    $('#J_SelectAllCbx2').attr("checked",false);
                }

            });
        }else{
            // alert('ok2');
            $("input[type='checkbox']").attr("checked",false);
            // console.log('no');
            var n = 0;
            var m = true;
            var $price = 0;
            $('.check').each(function(){
                // console.log(66);
                if ($(this).is(':checked')){
                    n++;
                    var id = $(this).attr('aid');
                    $price += parseFloat($('#price_'+id).text());
                    // alert($price);
                }else{
                    m = false;
                    console.log(m);
                }
                //勾选商品总价
                $('#J_Total').text($price);
                //勾选商品数量
                $('#J_SelectedItemsCount').text(n);
                //商品全部勾选时 全选
                if (m){
                    $('#J_SelectAllCbx2').attr("checked",true);
                }else {
                    $('#J_SelectAllCbx2').attr("checked",false);
                }

            });
        }
    });
    //商品Input框change事件
    $('.check').change(function(){
        var n = 0;
        var m = true;
        var $price = 0;
        $('.check').each(function(){
            // console.log(66);
            if ($(this).is(':checked')){
                n++;
                var id = $(this).attr('aid');
                 $price += parseFloat($('#price_'+id).text());
                // alert($price);
            }else{
                m = false;
                // console.log(m);
            }
            //勾选商品总价
            $('#J_Total').text($price);
            //勾选商品数量
            $('#J_SelectedItemsCount').text(n);
            //商品全部勾选时 全选
            if (m){
                $('#J_SelectAllCbx2').attr("checked",true);
            }else {
                $('#J_SelectAllCbx2').attr("checked",false);
            }

        });

    });

    //商品 删除
    function del(id){
        //使用layui  弹出层优化提示框
        layui.use('layer',function () {
            layer.confirm('您确定要删除吗？', {
                btn: ['是','取消'] //按钮
            }, function(){
                //页面删除动画效果
                $('#tr_'+id).remove();
                var $_token = "{{csrf_token()}}";
                //删除数据库
                $.post("{{url('Home/Cart/indexAction')}}", {product_id: id, _token: $_token}, function () {

                }, 'json');
                layer.msg('删除成功!', {icon: 1});//删除成功提示
            }, function(){

            });
        });
    }
    //勾选删除
    function delAll() {
        var nb = 0;
        $('.check').each(function () {
            if ($(this).is(':checked')) {
                nb++;
            }
        });
        if (nb) {
            //使用layui  弹出层优化提示框
            layui.use('layer', function () {
                layer.confirm('您确定要删除吗？', {
                    btn: ['是', '取消'] //按钮
                }, function () {
                    var arr_id = [];
                    $('.check').each(function () {
                        if ($(this).is(':checked')) {
                            id = $(this).attr('aid');
                            //页面删除动画效果
                            $('#tr_' + id).remove();
                            arr_id[id] = id;
                        }
                    });
                    console.log(arr_id);

                    var $_token = "{{csrf_token()}}";
                    //删除数据库
                    $.post("{{url('Home/Cart/indexAction')}}", {product_id: arr_id, _token: $_token}, function () {

                    }, 'json');
                    layer.msg('删除成功!', {icon: 1});//删除成功提示
                }, function () {

                });
            });
        }else {
            layui.use('layer', function () {
                layer.confirm('请至少选择一件商品', {
                    btn: ['知道了'] //按钮
                })
            })
        }
    }
    //商品结算
    $('#J_Go').click(function(){
        var num = 0;
        $('.check').each(function () {
            if ($(this).is(':checked')) {
                num++;
            }
        });
        if (num){
            //获取提交商品的id
            var arr_id = [];
            $('.check').each(function () {
                if ($(this).is(':checked')) {
                    id = $(this).attr('aid');
                    arr_id[id] = id;
                }

                // alert(arr_id);
                // console.log(arr_id);
            $('#J_Go').prop('href',"{{url('Home/Cart/pay')}}?product_id="+arr_id+"");
            });
        }else {
            layui.use('layer', function () {
                layer.confirm('请至少选择一件商品', {
                    btn: ['知道了'] //按钮
                })
            })
        }
    })
</script>

{{--购物车 商品数量的精髓 控制--}}
<script>
    function add(id){
        var num =  $('#num_'+id).val();
        num++;
        $('#num_'+id).val(num);
        var $num = $('#num_'+id).val();//购买数量
        var $price = $('#pr_'+id).text();//商品单价
        $('#price_'+id).text($num*$price);//一种总价
        $('#che_'+id).attr("checked",true);

        var n = 0;
        var m = true;
        var $price = 0;
        $('.check').each(function(){
            // console.log(66);
            if ($(this).is(':checked')){
                n++;
                var id = $(this).attr('aid');
                $price += parseFloat($('#price_'+id).text());
                // alert($price);
            }else{
                m = false;
                // console.log(m);
            }
            //勾选商品总价
            $('#J_Total').text($price);
            $('#J_SelectedItemsCount').text(n);
            //商品全部勾选时 全选
            if (m){
                $('#J_SelectAllCbx2').attr("checked",true);
            }else {
                $('#J_SelectAllCbx2').attr("checked",false);
            }

        });

        var $_token = "{{csrf_token()}}";
        $.post("{{url('/Home/Cart/indexAction')}}",{product_id:id,product_num:$num,_token:$_token},
            function(){
            },'json')
    }
    function acc(id){
        var num =  $('#num_'+id).val();
        if(num > 1){  //购买数量不能为零
            num--;
            $('#num_'+id).val(num);
            var $num = $('#num_'+id).val();//购买数量
            var $price = $('#pr_'+id).text();//商品单价
            $('#price_'+id).text($num*$price);//一种总价

            $('#che_'+id).attr("checked",true);
            var n = 0;
            var m = true;
            var $price = 0;
            $('.check').each(function(){
                // console.log(66);
                if ($(this).is(':checked')){
                    n++;
                    var id = $(this).attr('aid');
                    $price += parseFloat($('#price_'+id).text());
                    // alert($price);
                }else{
                    m = false;
                    // console.log(m);
                }
                //勾选商品总价
                $('#J_Total').text($price);
                $('#J_SelectedItemsCount').text(n);
                //商品全部勾选时 全选
                if (m){
                    $('#J_SelectAllCbx2').attr("checked",true);
                }else {
                    $('#J_SelectAllCbx2').attr("checked",false);
                }

            });

            var $_token = "{{csrf_token()}}";
            $.post("{{url('/Home/Cart/indexAction')}}",{product_id:id,product_num:$num,_token:$_token},
                function(){
                },'json')
        }
    }
</script>



</html>
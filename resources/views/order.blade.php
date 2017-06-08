@extends('master')
@section('title','申请')
@section('content')
    <style>
        h4 {
            font-weight: 400;
            font-size: 17px;
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;//文字超过盒子宽度显示省略符号
        white-space: nowrap;//文本不会换行，文本会在在同一行上继续，直到遇到 <br> 标签为止
            /*不明白微信为毛写那么多和换行相关的属性*/
        word-wrap: normal;
            word-wrap: break-word;//允许长单词换行到下一行
        word-break: break-all;//使用浏览器默认的换行规则

        }

        p {
            color: #999999;
            font-size: 13px;
            line-height: 1.2;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">
    <div class="weui_tab " style="height:44px;" id="tab1"><!--tab-fixed添加顶部-->
        <div class="weui_navbar" style="height:44px;">
            <div class="weui_navbar_item a">
                已发货
            </div>
            <div class="weui_navbar_item b">
                未发货
            </div>
            <div class="weui_navbar_item c">
                全部订单
            </div>
            <div class="weui_navbar_item d">
                全部订单
            </div>
            <div class="weui_navbar_item e">
                全部订单
            </div>
        </div>
    </div>

    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item " >            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                    <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex">
        <div class="weui-flex-item"><div class="placeholder">weui</div></div>
        <div class="weui-flex-item">
            <div class="media_bd">
                <a href="1234">     <h4 class="media_title">456789123</h4>
                <p class="media_desc">作者:1234  发布时间:1234</p></a>
            </div></div>
    </div>
    <div class="weui-flex a">
        <div class="weui-flex-item b"><div class="placeholder">weui</div></div></a>
        <div class="weui-flex-item a"><div class="placeholder">weui</div></div>
        <div class="weui-flex-item a"><div class="placeholder">weui</div></div>
    </div>
    <div class="weui-flex">
        <div class="weui-flex-item 1"><div class="placeholder">weui</div></div>
        <div class="weui-flex-item 1"><div class="placeholder">weui</div></div>
        <div class="weui-flex-item"><div class="placeholder">weui</div></div>
        <div class="weui-flex-item a"><div class="placeholder">55555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555</div></div>
    </div>



@endsection

@section('js')
    $('#tab1').tab({defaultIndex:0,activeClass:"tab-green"});



    $(function(){
    $('.weui_navbar_item').on('click', function () {
    $(".weui-flex-item.a").hide(0);
    $(this).addClass('weui-bar__item_on').siblings('.weui-bar__item_on').removeClass('weui-bar__item_on');
    });
    });

    $(document).ready(function(){
    $(".btn1").click(function(){
    $(".page").hide(0);
    });
    $(".btn2").click(function(){
    $(".page").show(0);
    });
    });

@endsection
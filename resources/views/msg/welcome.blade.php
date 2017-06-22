@extends('master')
@section('title','成功')
@section('content')

    <div class="weui_msg" id="msg1">
        <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">欢迎加入丰纳</h2>
            <p class="weui_msg_desc">稍等1-5分钟后,公众号菜单即可改变。</p>
            <p class="weui_msg_desc">取消关注公众号，即视为放弃合伙人资格。</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" onclick="js_method();" class="weui_btn weui_btn_primary">提交订单</a>
                <a href="javascript:;" onclick="js_method2();" class="weui_btn weui_btn_default">我的订单</a>
            </p>
        </div>
        <div class="weui_extra_area">
        </div>
    </div>

@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
    function js_method() {
    location.href="loan1";
    }
    function js_method2() {
    location.href="order";
    }
@endsection

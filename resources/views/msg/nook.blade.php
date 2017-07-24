@extends('master')
@section('title','失败')
@section('content')
    <div class="weui_msg" id="msg2">
        <div class="weui_icon_area"><i class="weui_icon_warn weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">操作失败</h2>
            <p class="weui_msg_desc">请向开发者提交此错误</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" onclick="js_method();" class="weui_btn weui_btn_primary">点击返回</a>
            </p>
        </div>
        <div class="weui_extra_area">

        </div>
    </div>
@endsection
@section('js')
    function js_method() {
    history.back(-1);
    }
@endsection

@extends('master')
@section('title','成功')
@section('content')

    <div class="weui_msg" id="msg1">
        <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">操作成功</h2>
            <p class="weui_msg_desc">点击返回</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" onclick="js_method();" class="weui_btn weui_btn_primary">返回</a>
                {{--<a href="javascript:;" onclick="js_method2();" class="weui_btn weui_btn_default">辅助操作</a>--}}
            </p>
        </div>
        <div class="weui_extra_area">
        </div>
    </div>

@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
    function js_method() {
        history.back(-1);
    }
@endsection

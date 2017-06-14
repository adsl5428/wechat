@extends('master')
@section('title','失败')
@section('content')
    <div class="weui_msg hide" id="msg1">
        <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">操作成功</h2>
            <p class="weui_msg_desc">内容详情，可根据实际需要安排，如果换行则不超过规定长度</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" class="weui_btn weui_btn_primary">推荐操作</a>
                <a href="javascript:;" class="weui_btn weui_btn_default">辅助操作</a>
            </p>
        </div>
        <div class="weui_extra_area">

        </div>
    </div>

@endsection

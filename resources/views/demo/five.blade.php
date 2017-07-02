@extends('master')
@section('title','预约下户')
@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/picker.js')}}"></script>
    @include('demo/title')

    <form id="form">
        <div class="weui_cells weui_cells_form ">
            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">预约时间:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="datetime-local" value="" placeholder="" />
                </div>
            </div>
        </div>

        <div class="weui_btn_area">
            <a id="reset" href="6" class="weui_btn weui_btn_primary" onclick=";">确定</a>
            <h5 class="page_title">　</h5>
            <a id="reset" href="javascript:" class="weui_btn weui_btn_primary" onclick=";">再次预约下户</a>
            <a id="reset" href="javascript:" class="weui_btn weui_btn_default" onclick=";">终止此单</a>
        </div>
    </form>
@endsection

@section('js')

@endsection
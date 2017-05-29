@extends('master')
@section('title','Welcome')
@section('content')
    <div class="page">
        <div class="hd">

            <h1 class="page_title">丰纳金融</h1>
            <h5 class="page_title">Join Us</h5>

        </div>
        <div class="bd">

            <div class="weui_cells weui_cells_form">
                <form action="staffregister" method="get">
                    {{csrf_field()}}
                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input name="tel" class="weui_input" type="number" placeholder="请输入手机号"/>
                    </div>
                </div>

            </div>
            <div class="weui_btn_area">
                    <button type="submit" onclick="subBase('#biaodan', '/jibenxinxi/test');">提交</button>
                    <input type="submit" value="立即登陆"/>
                <a type="submit" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
            </div>
            </form>
            <div class="weui_toptips weui_warn js_tooltips">格式不对</div>


        </div>
    </div>
@endsection
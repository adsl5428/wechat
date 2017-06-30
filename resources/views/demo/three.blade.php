@extends('master')
@section('title',$state[0])
@section('content')
@include('demo/title')
<div class="bd {{$state[1]}}">
<div class="weui_cells_title">方案A</div>
<div class="weui_cells weui_cells_form">
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <textarea id="qingkuangid" class="weui_textarea" placeholder="" rows="3">x公司,y产品,利息xx,服务费yy</textarea>
            {{--<div class="weui_textarea_counter"><span id='count'>0</span>/<span id='count_max'>20</span></div>--}}
        </div>
    </div>
    <a href="4" onclick="js_method2();" class="weui_btn weui_btn_primary">使用A方案</a>
</div>

<div class="weui_cells_title">方案B</div>
<div class="weui_cells weui_cells_form">
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <textarea id="qingkuangid" class="weui_textarea" placeholder="" rows="3">a公司,b产品,利息aa,服务费bb</textarea>
            {{--<div class="weui_textarea_counter"><span id='count'>0</span>/<span id='count_max'>20</span></div>--}}
        </div>
    </div>
    <a href="#" onclick="js_method2();" class="weui_btn weui_btn_primary">使用B方案</a>
</div>
    <h5 class="page_title">　</h5>
    <a href="#" onclick="js_method2();" class="weui_btn weui_btn_default">以上方案均不采用</a>
</div>
<div class="bd {{$state[2]}}">
    <div class="weui_cells_title">拒绝理由</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea id="qingkuangid" class="weui_textarea" placeholder="" rows="3">经查发现xxx,无匹配产品</textarea>
                {{--<div class="weui_textarea_counter"><span id='count'>0</span>/<span id='count_max'>20</span></div>--}}
            </div>
        </div>
    </div>
    <a href="#" onclick="js_method2();" class="weui_btn weui_btn_primary">订单列表</a>
</div>
@endsection
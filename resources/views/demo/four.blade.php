@extends('master')
@section('title','预约区间洽谈')
@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/picker.js')}}"></script>
 @include('demo/title')

    <form id="form">
        <div class="weui_cells weui_cells_form ">

            <div class="weui_cell">
                <div class="weui_cell_hd"><label for="" class="weui_label">预约时间:</label></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <input class="weui_input" type="datetime-local"/>
                </div>

            </div>

        </div>

        <div class="weui_btn_area">
            <a id="reset" href="javascript:" class="weui_btn weui_btn_primary" onclick="document.getElementById('form').reset();">重置</a>
        </div>
    </form>
@endsection

@section('js')
    $(function(){
    $("#text1").picker({
    title: "预约时间",
    cols: [
    {
    textAlign: 'center',
    values: ['刘备', '关羽','张飞']
    },
    {
    textAlign: 'center',
    values: ['喜欢', '憎恶', '基情', '可怜']
    },
    {
    textAlign: 'center',
    values: ['吃西瓜', '吃盒饭', '喝酒']
    }

    ]
    });

    });
@endsection
@extends('master')
@section('title','Join')
@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="page">
        <div class="hd">

            <h1 class="page_title">丰纳金融</h1>
            <h5 class="page_title">Join a partner</h5>

        </div>
        <div class="bd">

            <div class="weui_cells weui_cells_form">
                {{--<form action="staffregister" method="get">--}}
                {{--{{csrf_field()}}--}}
                {{--<div class="weui_cell">--}}
                    {{--<div class="weui_cell_hd"><label class="weui_label">名字</label></div>--}}
                    {{--<div class="weui_cell_bd weui_cell_primary">--}}
                        {{--<input id="nameid" name="name" class="weui_input"  placeholder="请输入您的真实姓名" value=""/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="weui_cell">--}}
                    {{--<div class="weui_cell_hd"><label class="weui_label">身份证</label></div>--}}
                    {{--<div class="weui_cell_bd weui_cell_primary">--}}
                        {{--<input id="cardid" name="card" class="weui_input"   placeholder="请输入您的身份证" value=""/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="weui_cell">--}}
                    {{--<div class="weui_cell_hd"><label class="weui_label">手机号</label></div>--}}
                    {{--<div class="weui_cell_bd weui_cell_primary">--}}
                        {{--<input id="telid" name="tel" class="weui_input" type="tel" placeholder="请输入手机号" value=""/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">邀请码</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="codeid" name="name" class="weui_input"  placeholder="请输入邀请码" value=""/>
                    </div>
                </div>
            </div>
            <div class="weui_btn_area">
                <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
            </div>
            {{--</form>--}}
            {{--<div class="weui_toptips weui_warn js_tooltips">格式不对</div>--}}
        </div>
    </div>
@endsection
@section('js')

    {{--@include('jsidcard')--}}

    function login()
    {
    {{--duixiang = document.getElementById('telid');--}}
    {{--var phone = duixiang.value;--}}
    {{--if(!(/^1[3|4|5|7|8][0-9]\d{8}$/.test(phone)))--}}
    {{--{--}}
    {{--$.alert("手机号码有误,请重填！", "填错啦");--}}
    {{--$.toptips("手机号码有误,请重填！");--}}

    {{--duixiang.value="";--}}
    {{--duixiang.focus();--}}
    {{--return false;--}}
    {{--}--}}

    {{--if(!validateIdCard($('#cardid').val())) return false;--}}

    {{--document.getElementById('btnlogin').innerHTML="正在提交中...";--}}
    $.showLoading();
    t = setTimeout(function() {
    $.hideLoading();$.toptips("服务无响应，请稍候再试 ");
    }, 10000);

    $.ajax(
    {
    type:"post" ,
    dataType: "json",
    data:
    {
    {{--'idcard':$('#cardid').val(),--}}
    {{--'name':$('#nameid').val(),--}}
    'code':$('#codeid').val(),
    {{--'tel':$('#telid').val(),--}}
    '_token':"{{csrf_token()}}"
    },
    url: "partnerregister",
    success:function(data){
    $.hideLoading();
    clearTimeout(t);
    if(data.status == 0)
    {
    $.toptips(data.msg);
    }
    else
    {
    {{--alert (data.msg)--}}
    location.href = data.msg;
    }
    }
    });
    }
@endsection
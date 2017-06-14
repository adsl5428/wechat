@extends('master')
@section('title','Join')
@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <link rel="stylesheet" type="text/css"  href="{{asset('css/weui2.css')}}">
    <div class="page">
        <div class="hd">

            <h1 class="page_title">丰纳金融</h1>
            <h5 class="page_title">Join a partner</h5>

        </div>
        <div class="bd">

            <div class="weui_cells weui_cells_form">
                {{--<form action="staffregister" method="get">--}}
                {{--{{csrf_field()}}--}}
                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="nameid" name="name" class="weui_input"  placeholder="请输入您的真实姓名" value="李宏城"/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="cardid" name="card" class="weui_input"   placeholder="请输入您的身份证" value="350525199009215338"/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="telid" name="tel" class="weui_input" type="tel" placeholder="请输入手机号" value="17750727971"/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">邀请码</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="codeid" name="name" class="weui_input"  placeholder="请输入邀请码" value="123"/>
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
    function validateIdCard(idCard){

    var regIdCard=/^(^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$)|(^[1-9]\d{5}(19|20)\d{2}((0[1-9])|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[Xx])$)$/;

    if(regIdCard.test(idCard)){
    if(idCard.length==18){
    var idCardWi=new Array( 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 );
    var idCardY=new Array( 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 );
    var idCardWiSum=0;
    for(var i=0;i<17;i++){
    idCardWiSum+=idCard.substring(i,i+1)*idCardWi[i];
    }

    var idCardMod=idCardWiSum%11;
    var idCardLast=idCard.substring(17);


    if(idCardMod==2){
    if(idCardLast=="X"||idCardLast=="x"){

    }else{
    $.toptips("身份证号码错误！");return false;
    }
    }else{

    if(idCardLast==idCardY[idCardMod]){

    }else{
    $.toptips("身份证号码错误！");return false;
    }
    }
    }
    }else{
    $.toptips("身份证格式不正确! ");return false;
    }
    return true;
    }


    function login()
    {
    duixiang = document.getElementById('telid');
    var phone = duixiang.value;
    if(!(/^1[3|4|5|7|8][0-9]\d{8}$/.test(phone)))
    {
    {{--$.alert("手机号码有误,请重填！", "填错啦");--}}
    $.toptips("手机号码有误,请重填！");

    duixiang.value="";
    duixiang.focus();
    return false;
    }

    if(!validateIdCard($('#cardid').val())) return false;

    {{--document.getElementById('btnlogin').innerHTML="正在提交中...";--}}
    $.showLoading();

    $.ajax(
    {
    type:"post" ,
    dataType: "json",
    data:
    {
    'idcard':$('#cardid').val(),
    'name':$('#nameid').val(),
    'code':$('#codeid').val(),
    'tel':$('#telid').val(),
    '_token':"{{csrf_token()}}"
    },
    url: "partnerregister",
    success:function(data){
    $.hideLoading();
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
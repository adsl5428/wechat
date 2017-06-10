@extends('master')
@section('title','申请')
@section('content')
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">

    <div class="page">
        <div class="hd">
            <h1 class="page_title">丰纳金融</h1>
            <h5 class="page_title">Loan</h5>
        </div>

        <div class="bd">
            <div class="weui_cells weui_cells_form">

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="nameid" name="name" class="weui_input"  placeholder="贷款人姓名" value="李宏城"/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="cardid" name="card" class="weui_input"  placeholder="贷款人身份证" value="350525199009215338"/>
                    </div>
                </div>




                <div class="weui_cell weui_vcode ">
                    <div class="weui_cell_hd"><label class="weui_label">贷款额</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="moneyid" class="weui_input" type="tel" placeholder="申请贷款金额" value="123" />
                    </div>
                    <div class="weui_cell_ft">
                        <i class="weui_icon_warn"></i>
                        <a class="weui-vcode-btn">万元</a>
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">用途</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="yongtuid" name="yongtu" class="weui_input"  placeholder="借款用途" value="做生意"/>
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">还款来源</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="laiyuanid" name="laiyuan" class="weui_input"  placeholder="还款来源" value="抢劫"/>
                    </div>
                </div>

                <div class="weui_cell"></div>

                <div class="weui_cells_title">特殊情况备注</div>
                <div class="weui_cells weui_cells_form">
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <textarea id="teshuid" class="weui_textarea" placeholder="客户的特殊情况做一个简单介绍" rows="3">1234567</textarea>
                            <div class="weui_textarea_counter"><span id='count'></span><span id='count_max'></span></div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="weui_btn_area">
                <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
            </div>

        </div>
    </div>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
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
    alert("身份证号码错误！"); return false;
    }
    }else{

    if(idCardLast==idCardY[idCardMod]){

    }else{
    alert("身份证号码错误！");return false;
    }
    }
    }
    }else{
    alert("身份证格式不正确!");return false;
    }
    return true;
    }

    function login()
    {

    if(!validateIdCard($('#cardid').val())) return false;

    if($('#yongtuid').val() == "")
    { alert("请填写借款用途!");return false;}

    if($('#laiyuanid').val()== "")
    { alert("请填写还款来源!");return false;}
    $.ajax(
    {
    type:"post" ,
    dataType: "json",
    data:
    {
    'idcard':$('#cardid').val(),
    'name':$('#nameid').val(),
    'money':$('#moneyid').val(),
    'yongtu':$('#yongtuid').val(),
    'laiyuan':$('#laiyuanid').val(),
    'teshu':$('#teshuid').val(),
    '_token':"{{csrf_token()}}"
    },
    url: "loan2",
    success:function(data){
    if(data.status == 0)
    {
    alert (data.msg);
    }
    else
    {

    location.href = data.msg;
    }
    }
    });
    }
@endsection
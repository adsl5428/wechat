@extends('master')
@section('title','申请')
@section('content')


    <div class="page">
        <div class="hd">
            <h1 class="page_title">丰纳金融</h1>
            <h5 class="page_title">Loan</h5>
        </div>

        <div class="bd">

            <div class="weui_cells weui_cells_form">
                {{--<form action="staffregister" method="get">--}}
                {{--{{csrf_field()}}--}}
                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="nameid" name="name" class="weui_input"  placeholder="贷款人姓名" value="黄大爷"/>
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
                        <input class="weui_input" type="tel" placeholder="申请贷款金额" value="123" />
                    </div>
                    <div class="weui_cell_ft weui_vimg_wrp">

                        <img src="./images/wan.png" />
                    </div>
                </div>



            </div>
            <div class="weui_btn_area">
                <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
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


    $.ajax(
    {
    type:"post" ,
    dataType: "json",
    data:
    {
    'idcard':$('#cardid').val(),
    'name':$('#nameid').val(),

    '_token':"{{csrf_token()}}"
    },
    url: "loan1",
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
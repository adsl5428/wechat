@extends('master')
@section('title','申请')
@section('content')

    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="page">
        <div class="hd">
            <h1 class="page_title">丰纳金融</h1>
        </div>

        <div class="bd">
            <div class="weui_cells_title">基本情况</div>
            <div class="weui_cells weui_cells_form">

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="nameid" name="name" class="weui_input"  placeholder="贷款人姓名" value=""/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="cardid" name="card" class="weui_input"  placeholder="贷款人身份证" value=""/>
                    </div>
                </div>


                <div class="weui_cell weui_vcode ">
                    <div class="weui_cell_hd"><label class="weui_label">贷款额(万元)</label></div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="moneyid" class="weui_input" type="tel" placeholder="申请贷款金额" value="" />
                    </div>
                    <div class="weui_cell_ft">
                        {{--<i class="weui_icon_warn"></i>--}}
                        <p class="weui-vcode-btn">万元</p>
                    </div>
                </div>

            </div>
                <div class="weui_cells_title">其他情况</div>
                <div class="weui_cells weui_cells_checkbox">
                    <label class="weui_cell weui_check_label" for="s11">
                        <div class="weui_cell_hd">
                            <input type="checkbox" name="checkbox1" class="weui_check" id="s11" >
                            <i class="weui_icon_checked"></i>
                        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>有备用房</p>
                        </div>
                    </label>
                    <label class="weui_cell weui_check_label" for="s12">
                        <div class="weui_cell_hd">
                            <input type="checkbox" name="checkbox1" class="weui_check" id="s12">
                            <i class="weui_icon_checked"></i>
                        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>离婚</p>
                        </div>
                    </label>
                    <label class="weui_cell weui_check_label" for="s13">
                        <div class="weui_cell_hd">
                            <input type="checkbox" class="weui_check" name="checkbox1" id="s13">
                            <i class="weui_icon_checked"></i>
                        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>小单边</p>
                        </div>
                    </label>
                    <label class="weui_cell weui_check_label" for="s14">
                        <div class="weui_cell_hd">
                            <input type="checkbox" name="checkbox1" class="weui_check" id="s14">
                            <i class="weui_icon_checked"></i>
                        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>老人房</p>
                        </div>
                    </label>
                    <label class="weui_cell weui_check_label" for="s15">
                        <div class="weui_cell_hd">
                            <input type="checkbox" name="checkbox1" class="weui_check" id="s15">
                            <i class="weui_icon_checked"></i>
                        </div>
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>小孩房</p>
                        </div>
                    </label>
            </div>


            <div class="weui_cells_title">客户情况及需求描述</div>
            <div class="weui_cells weui_cells_form">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <textarea id="qingkuangid" class="weui_textarea" placeholder="详细真实的描述，有利于我们帮您快速匹配出合适的解决方案。" rows="3"></textarea>
                        {{--<div class="weui_textarea_counter"><span id='count'>0</span>/<span id='count_max'>20</span></div>--}}
                    </div>
                </div>
            </div>

            <div class="weui_btn_area">
                <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
            </div>
            <h5 class="page_title">　</h5>
                {{--<a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>--}}

        </div>
    </div>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
    @include('jsidcard')
    function login()
    {
    var one ;
    var teshu = "";
    for ( i = 11; i < 16; i++)
    {one =  $("#s"+i).is(':checked')== true ?'1':'0';teshu =teshu + one;}
    {{--alert(teshu);--}}
    {{--teshu = $("#s"+11).is(':checked')== true ?'T':'F';--}}
    {{--$.toptips(teshu);return false;--}}

    if(!validateIdCard($('#cardid').val())) return false;

    if($('#moneyid').val() == "")
    { $.toptips("请填写金额!");return false;}

    if($('#nameid').val()== "")
    { $.toptips("请填写名字!");return false;}
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
    'idcard':$('#cardid').val(),
    'name':$('#nameid').val(),
    'money':$('#moneyid').val(),
    'teshu':teshu,
    'qingkuang':$('#qingkuangid').val(),
    '_token':"{{csrf_token()}}"
    },
    url: "loan2",
    success:function(data){
    if(data.status == 0)
    {
    clearTimeout(t);
    $.hideLoading();
    $.toptips(data.msg);
    }
    else
    {
    location.href =data.msg;

    }
    }
    });
    }
@endsection
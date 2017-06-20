@extends('master')
@section('title','申请')
@section('content')


    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="weui_tab " style="height:44px;" id="tab1"><!--tab-fixed添加顶部-->
        <div class="weui_navbar" style="height:44px;">
            <div class="weui_navbar_item a">
                我的订单
            </div>
            {{--<div class="weui_navbar_item b">--}}
                {{--初审--}}
            {{--</div>--}}
            {{--<div class="weui_navbar_item c">--}}
                {{--全部订单--}}
            {{--</div>--}}
            {{--<div class="weui_navbar_item d">--}}
                {{--全部订单--}}
            {{--</div>--}}
            {{--<div class="weui_navbar_item e">--}}
                {{--全部订单--}}
            {{--</div>--}}
        </div>
    </div>



    <div class="weui_cells weui_cells_access">
        <a class="weui_cell a2" href="javascript:;">
                        <div class="weui_cell_bd weui_cell_primary">
                <span class="media_desc">老王　</span ><span class="media_desc">100万　</span >
                <b><span class="media_desc">一抵　</span ></b><span class="media_desc f21 bg-blue">初审</span >
            </div>
            <div class="weui_cell_ft"></div>
        </a>
    </div>

@endsection

@section('js')
    {{--<script type='text/javascript'>--}}
    $('#tab1').tab({defaultIndex:0,activeClass:"tab-green"});

    $(function(){
    $('.weui_navbar_item.a').on('click', function () {
    allshow();
    });

    $('.weui_navbar_item.b').on('click', function () {
    showhide(1,3,4,5,2);
    });

    $('.weui_navbar_item.c').on('click', function () {
    showhide(1,5,2,4,3);
    });

    $('.weui_navbar_item.d').on('click', function () {
    showhide(1,3,5,2,4);
    });

    $('.weui_navbar_item.e').on('click', function () {
    showhide(1,3,4,2,5);
    });

    });

    function showhide(a,b,c,d,e){
    $(".weui_cell.a"+a).hide(0);
    $(".weui_cell.a"+b).hide(0);
    $(".weui_cell.a"+c).hide(0);
    $(".weui_cell.a"+d).hide(0);
    $(".weui_cell.a"+e).show(0);
    }
    function allshow(){
    $(".weui_cell.a"+1).show(0);
    $(".weui_cell.a"+2).show(0);
    $(".weui_cell.a"+3).show(0);
    $(".weui_cell.a"+4).show(0);
    $(".weui_cell.a"+5).show(0);

    }
    {{--$(document).ready(function(){--}}
    {{--$(".btn1").click(function(){--}}
    {{--$(".page").hide(0);--}}
    {{--});--}}
    {{--$(".btn2").click(function(){--}}
    {{--$(".page").show(0);--}}
    {{--});--}}
    {{--});--}}

@endsection
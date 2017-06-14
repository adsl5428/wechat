@extends('master')
@section('title','申请')
@section('content')
    <style>
        .placeholder1 {
            background-color: #eb0000;
            color: #000001;
            height: 2.3em;
            line-height: 2.3em;
            margin: 5px;
            text-align: center;
        }

    </style>
    <link rel="stylesheet"  type="text/css"  href="{{asset('css/weui2.css')}}">
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="weui_tab " style="height:44px;" id="tab1"><!--tab-fixed添加顶部-->
        <div class="weui_navbar" style="height:44px;">
            <div class="weui_navbar_item a">
                全部订单
            </div>
            <div class="weui_navbar_item b">
                初审
            </div>
            <div class="weui_navbar_item c">
                全部订单
            </div>
            <div class="weui_navbar_item d">
                全部订单
            </div>
            <div class="weui_navbar_item e">
                全部订单
            </div>
        </div>
    </div>



    <div class="weui_cells weui_cells_access">
        <a class="weui_cell a1" href="javascript:;">
            {{--<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>--}}
            <div class="weui_cell_bd weui_cell_primary">
                <span  class="media_desc">名字</span ><span class="media_desc">名字</span >
            </div>
            <div class="weui_cell_ft">说明文字</div>
        </a>

        <a class="weui_cell a2" href="javascript:;">
            {{--<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>--}}
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
    check_username(1);

    });

    $('.weui_navbar_item.b').on('click', function () {
    $(".weui_cell.a"+2).hide(0);
    });

    $('.weui_navbar_item.b').on('click', function () {
    $(".weui_cell.a").show(0);
    });

    });

    function check_username(a){
    $(".weui_cell.a"+a).hide(0);
    {{--$(".weui_cell.a"+a).show(0);--}}
    {{--$(".weui_cell.a"+2).show(0);--}}
    {{--$(".weui_cell.a"+3).show(0);--}}
    {{--$(".weui_cell.a"+4).show(0);--}}
    {{--$(".weui_cell.a"+5).show(0);--}}

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
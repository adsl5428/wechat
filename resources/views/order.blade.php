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

        /*h4 {*/
            /*font-weight: 400;*/
            /*font-size: 17px;*/
            /*width: auto;*/
            /*overflow: hidden;*/
            /*text-overflow: ellipsis;//文字超过盒子宽度显示省略符号*/
        /*white-space: nowrap;//文本不会换行，文本会在在同一行上继续，直到遇到 <br> 标签为止*/
            /*!*不明白微信为毛写那么多和换行相关的属性*!*/
        /*word-wrap: normal;*/
            /*word-wrap: break-word;//允许长单词换行到下一行*/
        /*word-break: break-all;//使用浏览器默认的换行规则*/
        /*}*/

        /*p {*/
            /*color: #999999;*/
            /*font-size: 13px;*/
            /*line-height: 1.2;*/
            /*overflow: hidden;*/
            /*text-overflow: ellipsis;*/
            /*display: -webkit-box;*/
            /*-webkit-box-orient: vertical;*/
            /*-webkit-line-clamp: 2;*/
        /*}*/

    </style>
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">

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

    {{--<div class="weui-flex">--}}
        {{--<div class="weui-flex-item" >--}}
            {{--<a href="1234">--}}
            {{--<div class="placeholder a">--}}
                    {{--<h4 class="media_title">456789123</h4>--}}
                    {{--<span  class="media_desc">名字</span >--}}
                     {{--<span  class="media_desc">作者:1234  发布时间:1234</span >--}}
          {{--</div>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--名字 项目  金额 进度 --}}
    {{--<div class="weui-flex a">--}}
        {{--<div class="weui-flex-item"><div class="placeholder">weui</div></div>--}}
        {{--<div class="weui-flex-item"><div class="placeholder">weui</div></div>--}}
    {{--</div>--}}
    {{--<div class="weui-flex">--}}
        {{--<div class="weui-flex-item"><div class="placeholder">weui</div></div>--}}
        {{--<div class="weui-flex-item"><div class="placeholder">weui</div></div>--}}
        {{--<div class="weui-flex-item"><div class="placeholder">563</div></div>--}}
    {{--</div>--}}


    <div class="weui_cells weui_cells_access">
        <a class="weui_cell a" href="javascript:;">
            {{--<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>--}}
            <div class="weui_cell_bd weui_cell_primary">
                <span  class="media_desc">名字</span ><span class="media_desc">名字</span >
            </div>
            <div class="weui_cell_ft">说明文字</div>
        </a>
        <a class="weui_cell b" href="javascript:;">
            {{--<div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>--}}
            <div class="weui_cell_bd weui_cell_primary">
                <span class="media_desc">老王　</span ><b><span class="media_desc">一抵　</span ></b>
                <span class="media_desc">100万　</span ><span class="media_desc f21 bg-blue">初审</span >
            </div>
            <div class="weui_cell_ft"></div>
        </a>
    </div>

@endsection

@section('js')
    $('#tab1').tab({defaultIndex:0,activeClass:"tab-green"});

    $(function(){
    $('.weui_navbar_item.a').on('click', function () {
    $(".weui_cell.a").hide(0);
    });

    $('.weui_navbar_item.b').on('click', function () {
    $(".weui_cell.a").show(0);
    });
    });

    $(document).ready(function(){
    $(".btn1").click(function(){
    $(".page").hide(0);
    });
    $(".btn2").click(function(){
    $(".page").show(0);
    });
    });

@endsection
@extends('master')
@section('title','申请')
@section('content')
    <div class="weui_tab">
        <div class="weui_navbar">
            <a href="#tab1" class="weui_navbar_item weui_bar_item_on">
                选项一
            </a>
            <a href="#tab2" class="weui_navbar_item">
                选项二
            </a>
            <a href="#tab3" class="weui_navbar_item">
                选项三
            </a>
        </div>
        <!--<div class="weui_tab_bd">
            <p>主体内容放这里</p>
        </div>-->

        <style>
            .clear{clear: both;}
            .margin_50{margin-top: 52px;}
            .pad_6{padding-left: 6px;padding-right: 6px;}
            .mag_item{width: 100%;height: auto;}
            .mag_item img{width: 100%;height: auto;border: 0;}
        </style>
        <div class="clear margin_50"></div>
        <div class="weui_tab_bd">
            <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active pad_6">
                <div class="mag_item">
                    <img src="images/coubg.png" >
                    <p>期待更多的笔记可以和大家分享</p>
                </div>

                <div class="mag_item">
                    <img src="images/coubg.png">
                    <p>希望可以拜读大家的作品 为榭</p>
                </div>

                <div class="mag_item">
                    <img src="images/coubg.png" >
                    <p>其实只要你不输给自己 就可以让自己活得更加充实和快乐</p>
                </div>
            </div>
            <div id="tab2" class="weui_tab_bd_item">
                <h2 class="doc-head">希望可以拜读大家的作品 为榭</h2>
            </div>
            <div id="tab3" class="weui_tab_bd_item">
                <h3 class="doc-head">其实只要你不输给自己 就可以让自己活得更加充实和快乐</h3>
            </div>

        </div>
    </div>

@endsection

@section('js')

    $(function() {

    var i=0;
    $(".weui_navbar a").bind("click", function(){

    //css操作
    {{--alert(i++);--}}
    //操作导航栏
    $(".weui_bar_item_on").removeClass('weui_bar_item_on');
    //console.log($(this).find("a"));
    $(this).addClass("weui_bar_item_on");

    //操作内容切换
    $(".weui_tab_bd .weui_tab_bd_item_active").removeClass('weui_tab_bd_item_active');
    var data_toggle =jQuery(this).attr("href");
    $(data_toggle).addClass("weui_tab_bd_item_active");
    // $(this).addClass("weui_tab_bd_item_active");

    });
    });

@endsection
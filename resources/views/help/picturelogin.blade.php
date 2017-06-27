@extends('master')
@section('title','图片库')
@section('content')
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
    </div>
    <form Action="picture" method="POST">
        {{csrf_field()}}
    <div class="bd">
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <input type="password" id="nameid" name="name" class="weui_input"  placeholder="" value=""/>
                </div>
            </div>

            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <input  id="order" name="order" class="weui_input"  placeholder="" value=""/>
                </div>
            </div>
        </div>
    </div>
        {{--onclick="login()"--}}
    <div class="weui_btn_area">
        <input type="submit" value="确定" class="weui_btn weui_btn_primary">
    </div>
    </form>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
function login() {

    $.ajax(
        {
            type: "post",
            dataType: "json",
            data: {
                'order': $('#orderid').val(),
                'name': $('#nameid').val(),
                '_token': "{{csrf_token()}}"
            },
            url: "picture",
            success: function (data) {
                if (data.status == 0) {
                }
                else {
                    {{--location.href = data.msg;--}}
    alert(data.msg);
                }
            }
        });
    }
@endsection
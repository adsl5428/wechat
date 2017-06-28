@extends('master')
@section('title','!!!')
@section('content')
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h1 class="page_title"></h1>
        <h1 class="page_title">丰纳金融</h1>
        <h1 class="page_title"></h1>
    </div>
    <form Action="myadmin" method="POST">
        {{csrf_field()}}
        <div class="bd">
            <div class="weui_cells weui_cells_form">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <input  id="nameid" name="name" class="weui_input"  placeholder="" value=""/>
                    </div>
                </div>

                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <input type="password" id="passwordid" name="password" class="weui_input"  placeholder="" value=""/>
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
    'name': $('#nameid').val(),
    'password': $('#passwordid').val(),
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
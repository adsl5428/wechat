@extends('master')
@section('title','申请')
@section('content')

{{--<script type="text/javascript" src="http://fex.baidu.com/webuploader/js/webuploader.js"></script>--}}
<script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>

<link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css"  href="{{asset('css/webuploader.css')}}">
<script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>



<div class="hd">
    <h1 class="page_title">丰纳金融</h1>
</div>
@foreach($names as $name)


@endforeach

<div class="weui_btn_area">
    <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
</div>
<h5 class="page_title">　</h5>
@endsection
@section('js')
{{--<script type='text/javascript'>--}}

@endsection
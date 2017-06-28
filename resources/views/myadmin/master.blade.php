<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/wechat/weui.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/wechat/example.css')}}">
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>

    {{--<link rel="stylesheet" type="text/css"  href="{{asset('css/weui2.css')}}">--}}
    <script src="{{asset('css/wechat/zepto.min.js')}}"></script>
    <script src="{{asset('css/wechat/example.js')}}"></script>

    {{--<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>--}}
    <title>@yield('title')</title>
</head>
<body>
@yield('content')


<script type='text/javascript'>
@yield('js')
</script>

</body>
</html>
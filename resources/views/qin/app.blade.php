<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>!</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    {{--<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>--}}
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>

    </style>
</head>


<body>
@if (Auth::guest())
<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="navbar-header">
            {{--<a class="navbar-brand" href="/">丰纳金融</a>--}}

            @if (!Auth::guest())
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                    <li class="nav  dropdown navbar-brand ">
                        {{--<a href="#wechat" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--我的丰纳 <b class="caret"></b>--}}
                        {{--</a>--}}
                        <a href="#wechat" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                 aria-expanded="false">我的··<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li role="separator" class="divider"></li>--}}
                            <li><a href="own/info#wechat">我的信息</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="own/order#wechat">我的订单</a></li>
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li><a href="home">首页</a></li>--}}


                        </ul>
                    </li>

                <li class="nav  dropdown navbar-brand">
                    <a href="#wechat" class="dropdown-toggle" data-toggle="dropdown">
                        交单 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li class="dropdown-header">提交订单</li>--}}
                        <li><a href="loan/fang#wechat">房贷</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="loan/che#wechat">车贷</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="loan/xin#wechat">信贷</a></li>
                        {{--<li><a href="#">合伙人</a></li>--}}
                        {{--<li><a href="#">考勤</a></li>--}}
                        {{--<li><a href="#">薪资</a></li>--}}
                        {{--<li><a href="#">意见</a></li>--}}
                    </ul>
                </li>
                <li class="nav  dropdown navbar-brand">
                    <a href="#wechat" class="dropdown-toggle" data-toggle="dropdown">
                        其他 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        {{--<li class="dropdown-header">提交订单</li>--}}
                        <li><a href="#wechat">我要投诉</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#wechat">常见问题</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#wechat">产品介绍</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#wechat">小游戏</a></li>


                    </ul>
                </li>

            @else
                <a href="/join"  class="navbar-brand" >加入</a>
            @endif

        </div>

        @if (!Auth::guest())
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

            <li class="active dropdown">
                <a href="#wechat" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">"名字"{{--{{ Auth::user()->name }} --}}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">合伙人</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">考勤</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">薪资</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">意见</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">会议</a></li>


                </ul>
            </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{--{{ Auth::user()->name }} --}}管理
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        {{--<li><a href="#">邀请码</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        <li><a href="#">用户</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">薪资</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">订单</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{--{{ Auth::user()->name }} --}}登出
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/logout">登出</a></li>

                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
        @else

        @endif

    </div>
</nav>
@endif
@yield('content')
</body>
{{--<script type='text/javascript'>--}}

{{--</script>--}}
</html>
@yield('js')
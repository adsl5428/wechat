<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('css/weui.css')}}">
    <link rel="stylesheet" href="{{asset('css/example.css')}}">
    {{--<script src="{{asset('js/zepto.min.js')}}"></script>--}}

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
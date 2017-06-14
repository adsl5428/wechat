@extends('master')
@section('title','申请')
@section('content')

    {{--<script type="text/javascript" src="http://fex.baidu.com/webuploader/js/webuploader.js"></script>--}}
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/webuploader.css')}}">
    <script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>

    <style type="text/css">
        /**{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}*/
        .demo1 .demo2 .demo3 .demo4{ margin:0 auto; min-width:320px;}
        .ul_pics1 .ul_pics4 .ul_pics2 .ul_pics3{ float:left;}


        .ul_pics1 li{float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee; width:80px; height:80px;}
        .ul_pics4 li{float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee; width:80px; height:80px;}
        .ul_pics2 li{float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee; width:80px; height:80px;}
        .ul_pics3 li{float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee; width:80px; height:80px;}

        .ul_pics1 li img{width:80px;height:80px;}
        .ul_pics2 li img{width:80px;height:80px;}
        .ul_pics3 li img{width:80px;height:80px;}
        .ul_pics4 li img{width:80px;height:80px;}
        .ul_pics1 li i{ position:absolute; top:0px; right:-1px; background:red; cursor:pointer; font-style:normal; font-size:10px; width:14px; height:14px; text-align:center; line-height:12px; color:#fff;}
        .ul_pics2 li i{ position:absolute; top:0px; right:-1px; background:red; cursor:pointer; font-style:normal; font-size:10px; width:14px; height:14px; text-align:center; line-height:12px; color:#fff;}
        .ul_pics3 li i{ position:absolute; top:0px; right:-1px; background:red; cursor:pointer; font-style:normal; font-size:10px; width:14px; height:14px; text-align:center; line-height:12px; color:#fff;}
        .ul_pics4 li i{ position:absolute; top:0px; right:-1px; background:red; cursor:pointer; font-style:normal; font-size:10px; width:14px; height:14px; text-align:center; line-height:12px; color:#fff;}
        .progress1 .progress2 .progress3 .progress4 {position:relative; margin-top:30px; background:#eee;}
        .bar1 .bar2 .bar3 .bar4 {background-color: green; display:block; width:0%; height:15px; }
        .percent1 .percent2 .percent3 .percent4{position:absolute; height:15px; top:-18px; text-align:center; display:inline-block; left:0px; width:80px; color:#666; line-height:15px; font-size:12px; }
        .demo1 #btn1 { width:80px; height:80px; margin-left:5px; margin-top:5px; border:1px dotted #c2c2c2; background:url(up.png) no-repeat center; background-size:30px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}
        .demo2 #btn2 { width:80px; height:80px; margin-left:5px; margin-top:5px; border:1px dotted #c2c2c2; background:url(up.png) no-repeat center; background-size:30px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}
        .demo3 #btn3 { width:80px; height:80px; margin-left:5px; margin-top:5px; border:1px dotted #c2c2c2; background:url(up.png) no-repeat center; background-size:30px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}
        .demo4 #btn4 { width:80px; height:80px; margin-left:5px; margin-top:5px; border:1px dotted #c2c2c2; background:url(up.png) no-repeat center; background-size:30px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}
    </style>

    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
        <h5 class="page_title">Loan</h5>
    </div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">

                        <div class="weui_cell_ft"></div>
                    </div>
                    <div id="uploadimg">
                        <div id="fileList" class="uploader-list"></div>
                        <div  id="imgPicker"><p style="color: #ffffff;">选择身份证</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">

                        <div class="weui_cell_ft"></div>
                    </div>
                    <div id="uploadimg">
                        <div id="fileList1" class="uploader-list"></div>
                        <div  id="imgPicker1"><p style="color: #ffffff;">选择户口本</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="weui_btn_area">
        <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
    </div>
    <h5 class="page_title">　</h5>
@endsection
@section('js')
    var uploader = WebUploader.create({
    auto: true, // 选完文件后，是否自动上传
    swf: '{{asset('js/baidu/Uploader.swf')}}', // swf文件路径
    server: '{{asset('test')}}', // 文件接收服务端
    pick: '#imgPicker1', // 选择文件的按钮。可选
    // 只允许选择图片文件。
    accept: {
    title: 'Images',
    extensions: 'gif,jpg,jpeg,bmp,png',
    mimeTypes: 'image/*'
    },
    formData:{ '_token':"{{csrf_token()}}"},
    threads: 1,
    chunkRetry:5,
    fileNumLimit:20,
    });

    uploader.on( 'fileQueued', function( file ) {
    var $list = $("#fileList1"),
    $li = $(
    '<div id="' + file.id + '" class="file-item thumbnail" style="margin:2px 2px 2px 2px">' +
        '<img>' +
        '<div class="info">' + file.name + '</div>' +
        '</div>'
    ),
    $img = $li.find('img');

    // $list为容器jQuery实例
    $list.append( $li );

    // 创建缩略图
    uploader.makeThumb( file, function( error, src ) {
    if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
    }

    $img.attr( 'src', src );
    }, 100, 100 ); //100x100为缩略图尺寸
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
    $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
    $percent = $('<p class="progress"><span></span></p>')
    .appendTo( $li )
    .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file, res ) {
    console.log(res.filePath);//这里可以得到上传后的文件路径
    $( '#'+file.id ).addClass('upload-state-done');
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
    $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
    $error = $('<div class="error"></div>').appendTo( $li );
    }
    $error.text('上传失败');
    });
    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
    });
    var uploader = WebUploader.create({
    auto: true, // 选完文件后，是否自动上传
    swf: '{{asset('js/baidu/Uploader.swf')}}', // swf文件路径
    server: '{{asset('test')}}', // 文件接收服务端
    pick: '#imgPicker', // 选择文件的按钮。可选
    // 只允许选择图片文件。
    accept: {
    title: 'Images',
    extensions: 'gif,jpg,jpeg,bmp,png',
    mimeTypes: 'image/*'
    },
    formData:{ '_token':"{{csrf_token()}}"},
    threads: 1,
    chunkRetry:5,
    fileNumLimit:20,
    });

    uploader.on( 'fileQueued', function( file ) {
    var $list = $("#fileList"),
    $li = $(
    '<div id="' + file.id + '" class="file-item thumbnail" style="margin:2px">' +
        '<img>' +
        '<div class="info">' + file.name + '</div>' +
        '</div>'
    ),
    $img = $li.find('img');

    // $list为容器jQuery实例
    $list.append( $li );

    // 创建缩略图
    uploader.makeThumb( file, function( error, src ) {
    if ( error ) {
    $img.replaceWith('<span>不能预览</span>');
    return;
    }

    $img.attr( 'src', src );
    }, 100, 100 ); //100x100为缩略图尺寸
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
    $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
    $percent = $('<p class="progress"><span></span></p>')
    .appendTo( $li )
    .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file, res ) {
    console.log(res.filePath);//这里可以得到上传后的文件路径
    $( '#'+file.id ).addClass('upload-state-done');
    });

    // 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
    $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
    $error = $('<div class="error"></div>').appendTo( $li );
    }
    $error.text('上传失败');
    });
    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
    });
@endsection
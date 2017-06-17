@extends('master')
@section('title','申请')
@section('content')

    {{--<script type="text/javascript" src="http://fex.baidu.com/webuploader/js/webuploader.js"></script>--}}
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquey-bigic.js')}}"></script>
    <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/webuploader.css')}}">
    <script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>



    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
        <h5 class="page_title">Loan</h5>
    </div>


    @foreach($names as $name)
    <div class="weui_cells ">
        <div class="weui_cell">
            <div class="weui_cell_primary">
                {{--<div class="weui_uploader">--}}
                <div class="weui_uploader_hd">
                    {{--<div class="weui_cell_ft"></div>--}}
                </div>
                <div id="uploadimg">
                    <div id="fileList{{$name[1]}}" class="uploader-list"></div>
                    <div  id="imgPicker{{$name[1]}}"><p style="color: #ffffff;">上传 {{$name[0]}}</p></div>
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="weui-gallery" style="display: block">
        <span onclick="$('.weui-gallery').fadeOut(300);" class="weui-gallery-img" style="background-image: url(uploads/20170617122006461.png);"></span>
        <div class="weui-gallery-opr">
            <a href="javascript:" class="weui-gallery-del" onclick="$('.weui-gallery').fadeOut(300);">
                <i class="icon icon-26 f-gray">删除</i>
            </a>
        </div>
    </div>


    @endforeach

    <div class="weui_btn_area">
        <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">下一步</a>
    </div>
    <h5 class="page_title">　</h5>
@endsection
@section('js')
    {{--<script type='text/javascript'>--}}
   @foreach($names as $name)
      aaa('{{$name[0]}}','{{$name[1]}}');
   @endforeach
    function show (ths) {
    {{--alert(ths);--}}
    $('.weui-gallery').css("background-image","url(on.jpg)");
    $('.weui-gallery').fadeIn(300);
   }

    function aaa( name0,name1) {
        var uploader = WebUploader.create({
            auto: true, // 选完文件后，是否自动上传
            swf: '{{asset('js/baidu/Uploader.swf')}}', // swf文件路径
            server: '{{asset('test')}}', // 文件接收服务端
            pick: '#imgPicker'+name1, // 选择文件的按钮。可选
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData:{ '_token':'{{csrf_token()}}',leixing:name0},
            threads: 1,
            chunkRetry:5,
            fileNumLimit:20
        });

        uploader.on( 'fileQueued', function( file ) {
            var $list = $("#fileList"+name1),
                $li = $(
                    '<div id="' + file.id + '" class="file-item thumbnail" style="margin:2px 2px 2px 2px">' +
                    '<img alt="" id="' + file.id + 'img" onclick="show(alt)">' +
                     {{--'<div class="info">' + file.name + '</div>' +--}}
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
            {{--console.log(res.filePath);//这里可以得到上传后的文件路径--}}
             {{--outputObj(res);--}}
            {{--alert(res._raw);--}}
            $( '#'+file.id ).addClass('upload-state-done');
             $( '#'+file.id+'img' ).attr('alt',res._raw);
             {{--$( '#'+file.id ).html("<div class="upload-state-done" ></div>");--}}
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
    }

    function outputObj(obj) {
    var description = "";
    for (var i in obj) {
    description += i + " = " + obj[i] + "\n";
    }
    alert(description);
    }
    {{--@foreach($names as $name)--}}
    {{--var uploader = WebUploader.create({--}}
    {{--auto: true, // 选完文件后，是否自动上传--}}
    {{--swf: '{{asset('js/baidu/Uploader.swf')}}', // swf文件路径--}}
    {{--server: '{{asset('test')}}', // 文件接收服务端--}}
    {{--pick: '#imgPicker{{$name[1]}}', // 选择文件的按钮。可选--}}
    {{--// 只允许选择图片文件。--}}
    {{--accept: {--}}
    {{--title: 'Images',--}}
    {{--extensions: 'gif,jpg,jpeg,bmp,png',--}}
    {{--mimeTypes: 'image/*'--}}
    {{--},--}}
    {{--formData:{ '_token':'{{csrf_token()}}',leixing:'{{$name[0]}}'},--}}
    {{--threads: 1,--}}
    {{--chunkRetry:5,--}}
    {{--fileNumLimit:20--}}
    {{--});--}}

    {{--uploader.on( 'fileQueued', function( file ) {--}}
    {{--var $list = $("#fileList{{$name[1]}}"),--}}
    {{--$li = $(--}}
    {{--'<div id="' + file.id + '" class="file-item thumbnail" style="margin:2px 2px 2px 2px">' +--}}
        {{--'<img>' +--}}
        {{--'<div class="info">' + file.name + '</div>' +--}}
        {{--'</div>'--}}
    {{--),--}}
    {{--$img = $li.find('img');--}}

    {{--// $list为容器jQuery实例--}}
    {{--$list.append( $li );--}}

    {{--// 创建缩略图--}}
    {{--uploader.makeThumb( file, function( error, src ) {--}}
    {{--if ( error ) {--}}
    {{--$img.replaceWith('<span>不能预览</span>');--}}
    {{--return;--}}
    {{--}--}}

    {{--$img.attr( 'src', src );--}}
    {{--}, 100, 100 ); //100x100为缩略图尺寸--}}
    {{--});--}}
    {{--@endforeach--}}

    {{----}}
    {{----}}
    {{----}}
    {{--// 文件上传过程中创建进度条实时显示。--}}
    {{--uploader.on( 'uploadProgress', function( file, percentage ) {--}}
    {{--var $li = $( '#'+file.id ),--}}
    {{--$percent = $li.find('.progress span');--}}

    {{--// 避免重复创建--}}
    {{--if ( !$percent.length ) {--}}
    {{--$percent = $('<p class="progress"><span></span></p>')--}}
    {{--.appendTo( $li )--}}
    {{--.find('span');--}}
    {{--}--}}

    {{--$percent.css( 'width', percentage * 100 + '%' );--}}
    {{--});--}}

    {{--// 文件上传成功，给item添加成功class, 用样式标记上传成功。--}}
    {{--uploader.on( 'uploadSuccess', function( file, res ) {--}}
    {{--console.log(res.filePath);//这里可以得到上传后的文件路径--}}
    {{--$( '#'+file.id ).addClass('upload-state-done');--}}
    {{--});--}}

    {{--// 文件上传失败，显示上传出错。--}}
    {{--uploader.on( 'uploadError', function( file ) {--}}
    {{--var $li = $( '#'+file.id ),--}}
    {{--$error = $li.find('div.error');--}}

    {{--// 避免重复创建--}}
    {{--if ( !$error.length ) {--}}
    {{--$error = $('<div class="error"></div>').appendTo( $li );--}}
    {{--}--}}
    {{--$error.text('上传失败');--}}
    {{--});--}}
    {{--// 完成上传完了，成功或者失败，先删除进度条。--}}
    {{--uploader.on( 'uploadComplete', function( file ) {--}}
    {{--$( '#'+file.id ).find('.progress').remove();--}}
    {{--});--}}

@endsection
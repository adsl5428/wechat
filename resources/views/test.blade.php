@extends('master')
@section('title','申请')
@section('content')
    {{--<script type="text/javascript" src="{{asset('js/zepto.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-1.12.4.min.js')}}"></script>


    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
        <h5 class="page_title">Loan</h5>
    </div>

    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div id="uploadimg">
                <div id="fileList" class="uploader-list"></div>
                <div class="weui_cell_ft" id="imgPicker"></div>
                <div id="imgPicker">选择图片</div>
            </div>
        </div>


        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">户口本</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='imgPicker'>

                        </ul>
                        <div class="weui_uploader_input_wrp" id="file2">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl2' multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">婚姻关系证明</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img6'>

                        </ul>
                        <div class="weui_uploader_input_wrp" id="file6">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl6' multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">房产证</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img3'>

                        </ul>
                        <div class="weui_uploader_input_wrp" id="file3">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl3' multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="weui_btn_area">
        <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
    </div>
    <h5 class="page_title"></h5>
@endsection
@section('js')
    var uploader = WebUploader.create({
    auto: true, // 选完文件后，是否自动上传
    swf: 'js/Uploader.swf', // swf文件路径
    server: 'upload.php', // 文件接收服务端
    pick: '#imgPicker', // 选择文件的按钮。可选
    // 只允许选择图片文件。
    accept: {
    title: 'Images',
    extensions: 'gif,jpg,jpeg,bmp,png',
    mimeTypes: 'image/*'
    }
    });

    uploader.on( 'fileQueued', function( file ) {
    var $list = $("#fileList"),
    $li = $(
    '<div id="' + file.id + '" class="file-item thumbnail">' +
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




    $(function(){
    var f = document.querySelector('#headimgurl');
    f.onchange = function () {
    lrz(this.files[0],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {



    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img').append(li);
    //                                $('#img').append('<li class="weui_uploader_file weui_uploader_status" style="background-image:url('+obj.src+')"><div class="weui_uploader_status_content"><i class="weui_icon_cancel"></i></div></li>');
    //                                $('#file').append('<input value="'+response.result+'"  type="hidden"  name="files" />');
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {
    if (textStatus == 'timeout') {
    a_info_alert('请求超时');
    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    };

    //多图上传
    var f2 = document.querySelector('#headimgurl2');
    f2.onchange = function (e) {
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {
    //                                alert('成功');
    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img2').append(li);
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {

    if (textStatus == 'timeout') {
    a_info_alert('请求超时');

    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    }//for end
    };

    var f3 = document.querySelector('#headimgurl3');
    f3.onchange = function (e) {
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {
    //                                alert('成功');
    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img3').append(li);
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {

    if (textStatus == 'timeout') {
    a_info_alert('请求超时');

    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    }//for end
    };

    var f4 = document.querySelector('#headimgurl4');
    f4.onchange = function (e) {
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {
    //                                alert('成功');
    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img4').append(li);
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {

    if (textStatus == 'timeout') {
    a_info_alert('请求超时');
    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    }//for end
    };

    var f5 = document.querySelector('#headimgurl5');
    f5.onchange = function (e) {
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {
    //                                alert('成功');
    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img5').append(li);
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {

    if (textStatus == 'timeout') {
    a_info_alert('请求超时');
    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    }//for end
    };

    var f6 = document.querySelector('#headimgurl6');
    f6.onchange = function (e) {
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{quality:1}).then(function (rst) {
    console.log(rst);
    $.ajax({
    url: '{{asset('test')}}',
    type: 'post',
    data: { img: rst.base64,'_token':"{{csrf_token()}}"},
    dataType: 'json',
    timeout: 200000,
    success: function (response) {
    if (response.ecd == '0') {
    //                                alert('成功');
    li = '<li class="weui_uploader_file" style="background-image:url('+response.result+')"></li>';
    $('#img6').append(li);
    return true;
    } else {
    return alert(response.msg);
    }
    },
    error: function (jqXHR, textStatus, errorThrown) {

    if (textStatus == 'timeout') {
    a_info_alert('请求超时');
    return false;
    }
    alert(jqXHR.responseText);
    }
    });
    })
    .catch(function (err) {
    alert(err);
    })
    .always(function () {// 不管是成功失败，这里都会执行
    });
    }//for end
    };


    });

@endsection
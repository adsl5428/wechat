@extends('master')
@section('title','申请')
@section('content')
    {{--<script type="text/javascript" src="{{asset('js/zepto.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('js/dist/lrz.bundle.js')}}"></script>

    <style type="text/css">
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
                        <div class="weui_cell_bd weui_cell_primary">单图片不压缩上传</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img1'>


                        </ul>
                        <div class="weui_uploader_input_wrp">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" id="i1" onchange="previewImage(this)"/>
                            <input  type="hidden"  id="i4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">多图不压缩上传</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img2x'>

                        </ul>
                        <div class="weui_uploader_input_wrp">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  onchange="previewImage1(this)" multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="weui_btn_area">
    <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
</div>
    <h5 class="page_title">　</h5>
@endsection
@section('js')
    <script type='text/javascript'>
    function previewImage(file) {
    var MAXWIDTH = 100;
    var MAXHEIGHT = 200;
    if (file.files && file.files[0]) {
    var reader = new FileReader();
    reader.onload = function (evt) {
    $('#img1').html('<li class="weui_uploader_file" style="background-image:url('+evt.target.result+')"></li>');
    };
    reader.readAsDataURL(file.files[0]);//
    console.log(file.files[0]);
    }
    }
    function previewImage1(file) {
    var MAXWIDTH = 100;
    var MAXHEIGHT = 200;
    for(var i=0;i<file.files.length;i++){

    if (file.files && file.files[i]) {
    var reader = new FileReader();
    reader.onload = function (evt) {
    $('#img2x').append('<li class="weui_uploader_file" style="background-image:url('+evt.target.result+')"></li>');
    };
    reader.readAsDataURL(file.files[i]);
    }

    }

    }

    $(function(){


    var f = document.querySelector('#headimgurl');
    f.onchange = function () {
    lrz(this.files[0],{width:640,fieldName:"file"}).then(function (rst) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{asset('test')}}');

    xhr.onload = function () {
    if (xhr.status === 200) {
    var obj = eval('(' + xhr.responseText + ')');
    $('#img').html('<li onclick="var delimg=$(this);$.confirm(\'您确定要删除吗?\', \'确认删除?\', function() {delimg.remove();},function(){$.toast(\'取消操作\', \'cancel\');});" class="weui_uploader_file weui_uploader_status" style="background-image:url('+obj.src+')"><div class="weui_uploader_status_content"><i class="weui_icon_cancel"></i></div></li>');
    $("#headimgurl1").val(obj.src);
    } else {
    // 处理其他情况
    }
    };

    xhr.onerror = function () {
    // 处理错误
    };

    xhr.upload.onprogress = function (e) {
    // 上传进度
    var percentComplete = ((e.loaded / e.total) || 0) * 100;
    }

    // 添加参数
    rst.formData.append('size', rst.fileLen);
    rst.formData.append('base64', rst.base64);
    // 触发上传
    xhr.send(rst.formData);

    return rst;
    })

    .catch(function (err) {
    alert(err);
    })

    .always(function () {// 不管是成功失败，这里都会执行
    });
    }



    //多图上传
    var f2 = document.querySelector('#headimgurl2');
    f2.onchange = function (e) {

    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
    lrz(files[i],{width:640,fieldName:"file1"}).then(function (rst) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{asset('test')}}');

    xhr.onload = function () {
    if (xhr.status === 200) {
    var obj = eval('(' + xhr.responseText + ')');
    $('#img2').append('<li onclick="var delimg=$(this);$.confirm(\'您确定要删除吗?\', \'确认删除?\', function() {delimg.remove();},function(){$.toast(\'取消操作\', \'cancel\');});" class="weui_uploader_file weui_uploader_status" style="background-image:url('+obj.src+')"><div class="weui_uploader_status_content"><i class="weui_icon_cancel"></i></div></li>');
    $('#file2').append('<input value="'+obj.src+'"  type="hidden"  name="files" />');
    } else {
    // 处理其他情况
    }
    };

    xhr.onerror = function () {
    // 处理错误
    };

    xhr.upload.onprogress = function (e) {
    // 上传进度
    var percentComplete = ((e.loaded / e.total) || 0) * 100;
    };

    // 添加参数
    rst.formData.append('size', rst.fileLen);
    rst.formData.append('base64', rst.base64);
    // 触发上传
    xhr.send(rst.formData);

    return rst;
    })

    .catch(function (err) {
    alert(err);
    })

    .always(function () {// 不管是成功失败，这里都会执行
    });

    }//for end
    }

    })

@endsection
@extends('master')
@section('title','申请')
@section('content')
    <script type="text/javascript" src="{{asset('js/zepto.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plupload.full.min.js')}}"></script>

    <style type="text/css">
        /**{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}*/
        .demo1 .demo2 .demo3 .demo4{max-width:9999px; margin:0 auto; min-width:320px;}
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
                        <div class="weui_cell_bd weui_cell_primary">单图上传</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="demo1">
                        <a href="javascript:void(0)" id="btn1" class="weui_uploader_input_wrp"></a>
                        <ul id="ul_pics1" class="ul_pics1 clearfix">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">多图上传(微信规定最多9张)</div>
                        <div class="weui_cell_ft"></div>
                    </div>

                    <div class="weui_uploader_input_wrp">
                        <a href="javascript:void(0)" id="btn1" class="weui_uploader_input_wrp"></a>
                        <ul id="ul_pics1" class="ul_pics1 clearfix">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>







    <div class="weui_btn_area">
        <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
    </div>
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
                    xhr.open('POST', '1.php');

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
                        xhr.open('POST', '{{asset('loan2')}}');

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
    </script>
@endsection



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>移动端使用localResizeIMG4压缩图片</title>

    <link rel="stylesheet" href="{{asset('css/weui.css')}}">
    <link rel="stylesheet" href="{{asset('css/example.css')}}">
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <script src="{{asset('js/dist/lrz.bundle.js')}}"></script>

</head>


<body>
上传图片<input type="file" capture="camera" accept="image/*" name="logo" id="file">

<div class="weui_cells weui_cells_form">

    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <div class="weui_uploader">
                <div class="weui_uploader_hd weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">单图片压缩上传</div>
                    <div class="weui_cell_ft"></div>
                </div>
                <div class="weui_uploader_bd">
                    <ul class="weui_uploader_files" id='img'>

                    </ul>
                    <div class="weui_uploader_input_wrp">
                        <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" id="headimgurl" />
                        <input  type="hidden"  id="headimgurl1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <div class="weui_uploader">
                <div class="weui_uploader_hd weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">多图先压缩后上传</div>
                    <div class="weui_cell_ft"></div>
                </div>
                <div class="weui_uploader_bd">
                    <ul class="weui_uploader_files" id='img2'>


                    </ul>
                    <div class="weui_uploader_input_wrp" id="file2">
                        <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl2' multiple />

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>




</body>

<script type='text/javascript'>
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
//                                alert('成功');
                                $('#img2').append('<li onclick="var delimg=$(this);$.confirm(\'您确定要删除吗?\', \'确认删除?\', function() {delimg.remove();},function(){$.toast(\'取消操作\', \'cancel\');});" class="weui_uploader_file weui_uploader_status" style="background-image:url('+obj.src+')"><div class="weui_uploader_status_content"><i class="weui_icon_cancel"></i></div></li>');
                                $('#file2').append('<input value="'+response.result+'"  type="hidden"  name="files" />');
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
                                $('#img2').append('<li onclick="var delimg=$(this);$.confirm(\'您确定要删除吗?\', \'确认删除?\', function() {delimg.remove();},function(){$.toast(\'取消操作\', \'cancel\');});" class="weui_uploader_file weui_uploader_status" style="background-image:url('+obj.src+')"><div class="weui_uploader_status_content"><i class="weui_icon_cancel"></i></div></li>');
                                $('#file2').append('<input value="'+response.result+'"  type="hidden"  name="files" />');
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
        }
    });
</script>



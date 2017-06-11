@extends('master')
@section('title','申请')
@section('content')
    {{--<script type="text/javascript" src="{{asset('js/zepto.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('js/dist/lrz.bundle.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">


<div class="hd">
    <h1 class="page_title">丰纳金融</h1>
    <h5 class="page_title">Loan</h5>
</div>

    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">身份证</div>
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
                        <div class="weui_cell_bd weui_cell_primary">户口本</div>
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


        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">信用报告</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img4'>

                        </ul>
                        <div class="weui_uploader_input_wrp" id="file4">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl4' multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_hd weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">其它有助于增加额度的资产证明（机动车，保单，股票……）</div>
                        <div class="weui_cell_ft"></div>
                    </div>
                    <div class="weui_uploader_bd">
                        <ul class="weui_uploader_files" id='img5'>

                        </ul>
                        <div class="weui_uploader_input_wrp" id="file5">
                            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif"  id='headimgurl5' multiple />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="weui-gallery" style="display: block">
        <span onclick="$('.weui-gallery').fadeOut();" class="weui-gallery-img" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAArIAAAGFBAMAAADzwA07AAAAIVBMVEXr6+vPz8/X19fp6ene3t7k5OTm5ubh4eHT09Pb29vR0dHqLrSfAAACyklEQVR42uzBgQAAAACAoP2pF6kCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGB27GdHaSiO4vgJ5e+s5lzAFlZ2Y1yWoIm6AjPJbItG3VJdmLiiOg9Aow8AybinK1/Tey9ldDttl+eTFC6w+4b+2luRNi2XcIJl8v/H6quHhf9BHiXnFlbGE6wep/D8+gm8Dp8CnEAeJePOBz4n7XKssi254gFWzEkVUWVb0uEeVklz7rxS2ZYM/PnfZ8zEz4atyrYkYOjn63emAPI5VLYtxczHe+HnbWxc7K9fVLYFxwjAIur5eVuGQLcgn6lsczkTYDNDOQb6Nma/oJWqbGMLV/EYIg6BAffIaG5iTlW2sSFXQDFGblzDAwqTIIi5VdmmRrZbYI/F3FXeDbj3uQ8q29SA1/ZYYcgtFkzeMAXQ50llmwo4RYcpRlwhj5DN4RShyjZWTHA1Bwa233Fm435w4onKNnY0yAwQ8BrFFGuezVS2sc0c6xBAPA04Rswz8+9Z7VBl61lwG48BrCd+IEQ33i36DB8eNKpsHUP+KPcAMuMvYgYXnFzS71S2jhF/8+D/mq+YIotwURh4GVOVraPHXy4dOsznfrNb3XUh9kv3nqhsHQEjlw5dFsa97qudAnK/RI8GKltLTANfkyEQlFECfOMBGDFKAaw5Vtl61lW1wifMaW7fMkpcZJr7u+fkTmXr2VRbgqM/+3slrZ+wPtP7A5WtZ8FTVfgA63VhYyZw3tGaJSrbkuDTe1Re3t1/hIiIiIiIiIiIiIj8ZQ8OBAAAAACA/F8bQVVVVVVVVVVVVVVVVVVVhT04EAAAAAAA8n9tBFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVpT04JAAAAAAQ9P+10RMAAAAAAAAAAAAAAADAArTtXKLPR7LcAAAAAElFTkSuQmCC);"></span>
        <div class="weui-gallery-opr">
            <a href="javascript:" class="weui-gallery-del" onclick="$('.weui-gallery').fadeOut();">
                <i class="icon icon-26 f-gray">删除</i>
            </a>
        </div>
    </div>
    <a href="javascript:" onclick="$('.weui-gallery').fadeIn();"  class="weui_btn weui_btn_primary">
        显示
    </a>

    <div class="weui_btn_area">
    <a id="btnlogin" onclick="login()" class="weui_btn weui_btn_primary" href="javascript:">确定</a>
</div>
    <h5 class="page_title">　</h5>
@endsection
@section('js')
    $('.weui-gallery').fadeOut();
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
    //                                li = "<img src='" + response.result + "' />";
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
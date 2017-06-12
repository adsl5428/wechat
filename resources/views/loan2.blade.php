@extends('master')
@section('title','申请')
@section('content')
    {{--<script type="text/javascript" src="{{asset('js/zepto.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('js/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plupload.full.min.js')}}"></script>

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
                    <div class="weui_cell_bd weui_cell_primary">身份证</div>
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
    </div>
    <div class="weui_cells weui_cells_form">
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <div class="weui_uploader">
                <div class="weui_uploader_hd weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">户口本(可多选上传)</div>
                    <div class="weui_cell_ft"></div>
                </div>
                <div class="demo2">
                    <a href="javascript:void(0)" id="btn2" class="weui_uploader_input_wrp"></a>
                    <ul id="ul_pics2" class="ul_pics2 clearfix">
                    </ul>
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
                    <div class="weui_cell_bd weui_cell_primary">房产证(可多选上传)</div>
                    <div class="weui_cell_ft"></div>
                </div>
                <div class="demo3">
                    <a href="javascript:void(0)" id="btn3" class="weui_uploader_input_wrp"></a>
                    <ul id="ul_pics3" class="ul_pics3 clearfix">
                    </ul>
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
                    <div class="weui_cell_bd weui_cell_primary">征信报告(可多选上传)</div>
                    <div class="weui_cell_ft"></div>
                </div>
                <div class="demo4">
                    <a href="javascript:void(0)" id="btn4" class="weui_uploader_input_wrp"></a>
                    <ul id="ul_pics4" class="ul_pics4 clearfix">
                    </ul>
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
    var uploader = new plupload.Uploader({    //创建实例的构造方法
    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
    browse_button: 'btn1' ,           // 上传按钮
    url: "{{asset('test')}}",        //远程上传地址
    flash_swf_url: '{{asset('js/Moxie.swf')}}',    //flash文件地址
    silverlight_xap_url: '{{asset('js/Moxie.xap')}}', //silverlight文件地址
    filters: {
    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
    mime_types: [  //允许文件上传类型
    {title: "files", extensions: "jpg,png"}
    ]
    },
    multipart_params:{ '_token':'{{csrf_token()}}' },  //文件上传附加参数
    file_data_name:"file", //文件上传的名称
    multi_selection: false , //true:ctrl多文件上传, false 单文件上传
    init: {
    FilesAdded: function(up, files) { //文件上传前
    if ($("#ul_pics1").children("li").length > 10) {
    alert("您上传的图片太多了！");
    uploader.destroy();
    } else {
    var li = '';
    plupload.each(files, function(file) { //遍历文件
    li += "<li id='" + file['id'] + "'><div class='progress1'><span class='bar1'></span><span class='percent1'>上传中 0%</span></div></li>";
    });
    $("#ul_pics1").append(li);
    uploader.start();
    }
    },
    UploadProgress: function(up, file) { //上传中，显示进度条
    var percent = file.percent;
    $("#" + file.id).find('.bar1').css({"width": percent + "%"});
    $("#" + file.id).find(".percent1").text("上传中 "+percent + "%");
    },
    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
    //var data = eval("(" + info.response + ")");
    $("#" + file.id).html("<img src='"+info.response+"' /><i onclick='delimg(this)'>x</i><input type='hidden' name='' value='"+ this.url +"'>");
    },
    Error: function(up, err) { //上传出错的时候触发
    alert("上传错误,请稍候再试");
    }
    }
    });
    uploader.init();

    var uploader2 = new plupload.Uploader({    //创建实例的构造方法
    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
    browse_button: 'btn2' ,           // 上传按钮
    url: "{{asset('test')}}",        //远程上传地址
    flash_swf_url: '{{asset('js/Moxie.swf')}}',    //flash文件地址
    silverlight_xap_url: '{{asset('js/Moxie.xap')}}', //silverlight文件地址
    filters: {
    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
    mime_types: [  //允许文件上传类型
    {title: "files", extensions: "jpg,png"}
    ]
    },
    multipart_params:{ '_token':'{{csrf_token()}}' },  //文件上传附加参数
    file_data_name:"file", //文件上传的名称
    multi_selection: true, //true:ctrl多文件上传, false 单文件上传
    init: {
    FilesAdded: function(up, files) { //文件上传前
    if ($("#ul_pics2").children("li").length > 10) {
    alert("您上传的图片太多了！");
    uploader2.destroy();
    } else {
    var li = '';
    plupload.each(files, function(file) { //遍历文件
    li += "<li id='" + file['id'] + "'><div class='progress2'><span class='bar2'></span><span class='percent2'>上传中 0%</span></div></li>";
    });
    $("#ul_pics2").append(li);
    uploader2.start();
    }
    },
    UploadProgress: function(up, file) { //上传中，显示进度条
    var percent = file.percent;
    $("#" + file.id).find('.bar2').css({"width": percent + "%"});
    $("#" + file.id).find(".percent2").text("上传中 "+percent + "%");
    },
    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
    //var data = eval("(" + info.response + ")");
    $("#" + file.id).html("<img src='"+info.response+"'/><i onclick='delimg(this)'>x</i><input type='hidden' name='' value='"+ this.url +"'>");
    },
    Error: function(up, err) { //上传出错的时候触发
    alert("上传错误,请稍候再试");
    }
    }
    });
    uploader2.init();

    var uploader3 = new plupload.Uploader({    //创建实例的构造方法
    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
    browse_button: 'btn3' ,           // 上传按钮
    url: "{{asset('test')}}",        //远程上传地址
    flash_swf_url: '{{asset('js/Moxie.swf')}}',    //flash文件地址
    silverlight_xap_url: '{{asset('js/Moxie.xap')}}', //silverlight文件地址
    filters: {
    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
    mime_types: [  //允许文件上传类型
    {title: "files", extensions: "jpg,png"}
    ]
    },
    multipart_params:{ '_token':'{{csrf_token()}}' },  //文件上传附加参数
    file_data_name:"file", //文件上传的名称
    multi_selection: true, //true:ctrl多文件上传, false 单文件上传
    init: {
    FilesAdded: function(up, files) { //文件上传前
    if ($("#ul_pics3").children("li").length > 10) {
    alert("您上传的图片太多了！");
    uploader3.destroy();
    } else {
    var li = '';
    plupload.each(files, function(file) { //遍历文件
    li += "<li id='" + file['id'] + "'><div class='progress3'><span class='bar3'></span><span class='percent3'>上传中 0%</span></div></li>";
    });
    $("#ul_pics3").append(li);
    uploader3.start();
    }
    },
    UploadProgress: function(up, file) { //上传中，显示进度条
    var percent = file.percent;
    $("#" + file.id).find('.bar3').css({"width": percent + "%"});
    $("#" + file.id).find(".percent3").text("上传中 "+percent + "%");
    },
    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
    //var data = eval("(" + info.response + ")");
    $("#" + file.id).html("<img src='"+info.response+"'/><i onclick='delimg(this)'>x</i><input type='hidden' name='' value='"+ this.url +"'>");
    },
    Error: function(up, err) { //上传出错的时候触发
    alert("上传错误,请稍候再试");
    }
    }
    });
    uploader3.init();
    var uploader4 = new plupload.Uploader({    //创建实例的构造方法
    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
    browse_button: 'btn4' ,           // 上传按钮
    url: "{{asset('test')}}",        //远程上传地址
    flash_swf_url: '{{asset('js/Moxie.swf')}}',    //flash文件地址
    silverlight_xap_url: '{{asset('js/Moxie.xap')}}', //silverlight文件地址
    filters: {
    max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
    mime_types: [  //允许文件上传类型
    {title: "files", extensions: "jpg,png"}
    ]
    },
    multipart_params:{ '_token':'{{csrf_token()}}' },  //文件上传附加参数
    file_data_name:"file", //文件上传的名称
    multi_selection: true, //true:ctrl多文件上传, false 单文件上传
    init: {
    FilesAdded: function(up, files) { //文件上传前
    if ($("#ul_pics4").children("li").length > 10) {
    alert("您上传的图片太多了！");
    uploader4.destroy();
    } else {
    var li = '';
    plupload.each(files, function(file) { //遍历文件
    li += "<li id='" + file['id'] + "'><div class='progress4'><span class='bar4'></span><span class='percent4'>上传中 0%</span></div></li>";
    });
    $("#ul_pics4").append(li);
    uploader4.start();
    }
    },
    UploadProgress: function(up, file) { //上传中，显示进度条
    var percent = file.percent;
    $("#" + file.id).find('.bar4').css({"width": percent + "%"});
    $("#" + file.id).find(".percent4").text("上传中 "+percent + "%");
    },
    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
    //var data = eval("(" + info.response + ")");
    $("#" + file.id).html("<img src='"+info.response+"'/><i onclick='delimg(this)'>x</i><input type='hidden' name='' value='"+ this.url +"'>");
    },
    Error: function(up, err) { //上传出错的时候触发
    alert("上传错误,请稍候再试");
    }
    }
    });
    uploader4.init();

    function delimg(o){
    var src = $(o).prev().attr("src");
    alert(src);
    $.post("upimgs.php?get=delimg&imgurl="+src,function(data){
    if(data==1){
    $(o).parent().remove();
    }
    })
    }

@endsection
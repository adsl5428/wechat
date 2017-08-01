@extends('master')
@section('title','详细')

@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <script src="http://www.jq22.com/demo/pinchzoom-master20160513/src/pinchzoom.js"></script>
    <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/webuploader.css')}}">
    {{--<script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>--}}
<!-- 开始 朋友圈 -->
    <style>
        * {margin:0px;padding:0px;}
        .panel {
            position:absolute;
            left:0px;top:0px;
            height:100%;
            width:100%;
            overflow:hidden;
            background:rgba(0,0,0,0.1);
        }
        .picture {
            position:absolute;
            left:0px;top:0px;
            height:100%;
            width:100%;
        }
        .picture img {
            position:absolute;
            left:50%;top:50%;
            margin:-162px -225px;
        }
    </style>
<div class="weui_cells moments">
    <!-- 普通的post -->
    <div class="weui_cell moments__post">
        <div class="weui_cell_hd">
            <img src="data:image/jpeg;base64,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" />
        </div>

        <div class="weui_cell_bd">
            <!-- 人名链接 -->
            <a class="title" href="javascript:;">
                <span>合伙人:{{$order->partner_name}}</span>
            </a>
            <!-- post内容 -->
            <span>客户材料</span>

            <p>贷款人：{{$order->name}}</p>
            <p>身份证：{{$order->idcard}}</p>
            <p>申请金额：{{$order->money}}万</p>
            <p>@if($order->teshu[0])<label class="weui-label-s">有备用房</label>@endif
                @if($order->teshu[1])<label class="weui-label-s">离婚</label>@endif
                @if($order->teshu[2])<label class="weui-label-s">小单边</label>@endif
                @if($order->teshu[3])<label class="weui-label-s">老人房</label>@endif
                @if($order->teshu[4])<label class="weui-label-s">小孩房</label>@endif</p>

            <p>情况说明：@if(strlen($order->qingkuang) < 1)无@endif</p>
            <p id="paragraph" class="paragraph">
            {{$order->qingkuang}}
            </p>
            <!-- 伸张链接 -->
            <a id="paragraphExtender" class="paragraphExtender">显示全文</a>
            <!-- 相册 -->

            <a class="title" href="javascript:;">
                <span>照片材料</span>
            </a>


            <div class="thumbnails">

            @if(count($pictures) != 0)
                @foreach($pictures as $picture)
                <div class="thumbnail">
                    <div class="imginfo">
                        @if ($picture->type == 1) 身份证
                        @elseif($picture->type == 2) 户口本
                        @elseif($picture->type == 3) 征信
                        @elseif($picture->type == 4) 房产证
                        @elseif($picture->type == 5) 婚姻关系
                        @elseif($picture->type == 6) 备用房产证
                        @elseif($picture->type == 7) 离婚协议
                        @elseif($picture->type == 8) 其他
                        @endif
                    </div>
                    <img  onclick="show(this)" alt="{{url('uploads',$picture->path)}}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAABHNCSVQICAgIfAhkiAAAAAFzUkdCAK7OHOkAAAAEZ0FNQQAAsY8L/GEFAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAADUlEQVQYV2N49+7dfwAJYgPK+tLRowAAAABJRU5ErkJggg==" />
                </div>
                 @endforeach
                @endif
            </div>
            <!-- 资料条 -->
            <div class="toolbar">
                <p class="timestamp">最近更新：{{$order->updated_at->diffForHumans()}}</p>
                <div>
                    <div id="actionMenu" class="actionMenu slideIn">
                        <p class="actionBtn" id="btnLike">
                            <a href="{{url('edit1',$order->id)}}" class="fa">操作</a>
                        </p>
                    </div>
                </div>
                <a href="{{url('edit1',$order->id)}}"  id="actionToggle" class="actionToggle">修改</a>


            </div>
            <!-- 赞／评论区 -->
            <p class="liketext"><span class="nickname">{{$order->qianyue_name}}</span></p>
        </div>
        <!-- 结束 post -->
    </div>
</div>
<!-- 结束 朋友圈 -->
    <div class="pinch-zoom">

        <img src="frog.jpg"/>
    </div>

    {{--<div  class="weui-gallery" style="display: block">--}}
        {{--<div class="panel" onclick="$('.weui-gallery').fadeOut(300);">--}}
            {{--<div class="picture" id="picture" >--}}
                {{--<img  class="weui-gallery-img" width="100%"--}}
                      {{--onclick="$('.weui-gallery').fadeOut(300);"--}}
                       {{--onclick="da();"--}}
                      {{--src=""  alt="">--}}
{{--</div>--}}
{{--</div>--}}
    {{--</div>--}}


    <form method="POST"     @if(session('login')!= 'true')
    action="{{url('/myadmin/mshenhe')}}"
          @else
          action="{{url('/myadmin/shenhe')}}"
          @endif  >
        {{csrf_field()}}
        <input type="hidden" name="order_id" value="{{$order->id}}">
        <div class="weui_cells_title">审核</div>
    <div class="weui_cells weui_cells_checkbox">
        <div class="weui-flex">
         <div class="weui-flex-item">
             <label class="weui_cell weui_check_label" for="x13">
                 <div class="weui_cell_bd weui_cell_primary">
                     <p>通过,请预约</p>
                 </div>
                 <div class="weui_cell_ft">
                     <input value="通过,请预约" type="radio" name="status" checked="checked" class="weui_check" id="x13">
                     <span class="weui_icon_checked"></span>
                 </div>
             </label>
         </div>
            <div class="weui-flex-item">
                <label class="weui_cell weui_check_label" for="x12">

                    <div class="weui_cell_bd weui_cell_primary">
                        <p>请补充</p>
                    </div>
                    <div class="weui_cell_ft">
                        <input value="请补充" type="radio" name="status" class="weui_check"  id="x12" >
                        <span class="weui_icon_checked"></span>
                    </div>
                </label>
            </div>
        </div>
        <div class="weui-flex">
            <div class="weui-flex-item">
                <label class="weui_cell weui_check_label" for="x11">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>拒绝</p>
                    </div>
                    <div class="weui_cell_ft">
                        <input value="拒绝" type="radio" class="weui_check" name="status" id="x11">
                        <span class="weui_icon_checked"></span>
                    </div>
                </label>
            </div>
            <div class="weui-flex-item">
                <label class="weui_cell weui_check_label" for="x10">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>放款</p>
                    </div>
                    <div class="weui_cell_ft">
                        <input value="放款" type="radio" class="weui_check" name="status" id="x10">
                        <span class="weui_icon_checked"></span>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div class="weui_cells_title">需告知合伙人的信息</div>
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <textarea id="qingkuangid" class="weui_textarea"
                        name="beizhu"  placeholder="" rows="3"></textarea>
                {{--<div class="weui_textarea_counter"><span id='count'>0</span>/<span id='count_max'>20</span></div>--}}
            </div>
        </div>
    </div>
    <div class="weui_btn_area">
        {{--<a id="btnlogin" onclick="create()" class="weui_btn weui_btn_primary" href="javascript:">创建</a>--}}
        <input type="submit" class="weui_btn weui_btn_primary" value="提交并推送审核结果">
    </div>
    </form>
    <h5 class="page_title">　</h5>
@endsection

@section('js')
    $(function () {
    $('div.pinch-zoom').each(function () {
    new RTP.PinchZoom($(this), {});
    });
    })

    $('.pinch-zoom').fadeOut(0);
    var da=false;
    function da()
    {
        if(da == false)
         {da=true;   $('.weui-gallery-img').attr('width',"220%");}
      else
         {da=false;   $('.weui-gallery-img').attr('width',"100%");}
    }

    function show (ths) {
    {{--$('.weui-gallery-img').css("background-image",'url(' + ths.alt + ')');--}}
    $('.weui-gallery-img').attr('src',$(ths).attr("alt"));
    $('.pinch-zoom').fadeIn(300);
    $(ths).attr('src',ths.alt);
    }
    $(function(){
    //定义文本
    const paragraph = $('#paragraph');
    const paragraphText = paragraph.text();
    const paragraphLength = paragraph.text().length;
    //定义文章长度
    const maxParagraphLength = 80;
    //定义全文按钮
    const paragraphExtender = $('#paragraphExtender');
    var toggleFullParagraph = false;

    //定义全文按钮
    if (paragraphLength < maxParagraphLength) {
    paragraphExtender.hide();
    } else {
    paragraph.html(paragraphText.substring(0, maxParagraphLength) + '...');
    paragraphExtender.click(function(){
    if (toggleFullParagraph) {
    toggleFullParagraph = false;
    paragraphExtender.html('显示全文');
    paragraph.html(paragraphText.substring(0, maxParagraphLength) + '...');
    } else {
    toggleFullParagraph = true;
    paragraphExtender.html('收起');
    paragraph.html(paragraphText);
    }
    });
    };
    const menu = $('#actionMenu');
    const menuBtn = $('#actionToggle');
    menuBtn.click(function(){menu.toggleClass('active')});
    });

    window.onload=function(){
    //获取元素
    var picture=document.getElementById("picture");
    //添加触屏开始事件
    picture.addEventListener("touchstart",function(e){
    var p,f1,f2;
    //由于触屏的坐标是个数组，所以取出这个数组的第一个元素
    e=e.touches[0];
    //保存picture和开始触屏时的坐标差
    p={
    x:picture.offsetLeft-e.clientX,
    y:picture.offsetTop-e.clientY
    };
    //添加触屏移动事件
    document.addEventListener("touchmove",f2=function(e){
    //获取保触屏坐标的对象
    var t=t=e.touches[0];
    //把picture移动到初始计算的位置加上当前触屏位置
    picture.style.left=p.x+t.clientX+"px";
    picture.style.top=p.y+t.clientY+"px";
    //阻止默认事件
    e.preventDefault();
    },false);
    //添加触屏结束事件
    document.addEventListener("touchend",f1=function(e){
    //移除在document上添加的两个事件
    document.removeEventListener("touchend",f1);
    document.removeEventListener("touchmove",f2);
    },false);
    },false);
    };
@endsection
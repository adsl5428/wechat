@extends('master')
@section('title','详细')

@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/webuploader.css')}}">
    {{--<script type="text/javascript" src="{{asset('js/baidu/webuploader.min.js')}}"></script>--}}
<!-- 开始 朋友圈 -->
<div class="weui_cells moments">
    <!-- 普通的post -->
    <div class="weui_cell moments__post">
        <div class="weui_cell_hd">
            <img src="data:image/jpeg;base64,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" />
        </div>

        <div class="weui_cell_bd">
            <!-- 人名链接 -->
            <a class="title" href="javascript:;">
                <span>{{$order->partner_name}}</span>
            </a>
            <!-- post内容 -->
            <span>客户材料</span>

            <p>贷款人：{{$order->name}}</p>
            <p>身份证：{{$order->idcard}}</p>
            <p>贷款金额：{{$order->money}}万</p>
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
                <p class="timestamp">最近更新：{{$order->updated_at}}</p>
                <div>
                    <div id="actionMenu" class="actionMenu slideIn">
                        <p class="actionBtn" id="btnLike">
                            <a href="{{url('edit1',$order->id)}}" class="fa">修改</a>
                        </p>
                    </div>
                </div>
                <span id="actionToggle" class="actionToggle">···</span>


            </div>
            <!-- 赞／评论区 -->
            <p class="liketext"><span class="nickname">{{$order->qianyue_name}}</span></p>
        </div>
        <!-- 结束 post -->
    </div>
</div>
<!-- 结束 朋友圈 -->
    <div class="weui-gallery" style="display: block">
        <span onclick="$('.weui-gallery').fadeOut(300);" class="weui-gallery-img" style=""></span>
    </div>
@endsection

@section('js')
    $('.weui-gallery').fadeOut(0);

    function show (ths) {
    $('.weui-gallery-img').css("background-image",'url(' + ths.alt + ')');
    $('.weui-gallery').fadeIn(300);
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

@endsection
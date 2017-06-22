@extends('master')
@section('title','详细')

@section('content')
    <script src="{{asset('js/zepto.min.js')}}"></script>
<!-- 开始 朋友圈 -->
<div class="weui_cells moments">
    <!-- 普通的post -->
    <div class="weui_cell moments__post">
        <div class="weui_cell_hd">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" />
        </div>

        <div class="weui_cell_bd">
            <!-- 人名链接 -->
            <a class="title" href="javascript:;">
                <span>{{$order->partner_name}}</span>
            </a>
            <!-- post内容 -->
            <span>客户材料</span>
            <p>名字：{{$order->name}}</p>
            <p>身份证：{{$order->idcard}}</p>
            <p>贷款金额：{{$order->money}}</p>
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

            <p>材料照片</p>
            <div class="thumbnails">
                <div class="thumbnail">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" />
                </div>
                <div class="thumbnail">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" />
                </div>
                <div class="thumbnail">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" />
                </div>
            </div>
            <!-- 资料条 -->
            <div class="toolbar">
                <div>
                    <div id="actionMenu" class="actionMenu slideIn">
                        <p class="actionBtn" id="btnLike"><i class="icon icon-96"></i></p>
                        <p class="actionBtn" id="btnComment"><i class="icon icon-3"></i></p>
                    </div>
                </div>

            </div>
            <!-- 赞／评论区 -->
            <p class="liketext"><i class="icon icon-96"></i><span class="nickname">{{$order->qianyue_name}}</span></p>
        </div>
        <!-- 结束 post -->
    </div>
</div>
<!-- 结束 朋友圈 -->

@endsection

@section('js')
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
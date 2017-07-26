@extends('master')
@section('title','订单管理')
@section('content')
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('js/lazyimg.js')}}"></script>
    <script src="{{asset('js/updown.js')}}"></script>

    <div class="page-hd">
        <h1 class="page_title">订单列表 </h1>
    </div>
    <div class="weui_cell_ft">
        {{--<i class="weui_icon_warn"></i>--}}
        <a href="{{url('myadmin/logout')}}" class="weui-vcode-btn">登出</a>
    </div>
    <div class="weui_panel weui_panel_access">

        <table class="weui-table weui-border-tb"  id="table">
            <thead>
            {{--<tr>--}}
                {{--<th>借款人</th> <th>身份证</th> <th>金额</th> <th>备离单老小</th>--}}
                {{--<th>图片</th> <th>合伙人&签约人</th> <th>操作</th> </tr>--}}
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="weui_panel_bd"></div>
    </div>

    <div class="weui_btn_area">
        <input onclick="del(1)" class="weui_btn weui_btn_primary" value="创建">
    </div>
    <div class="weui-gallery" style="display: block">
        <img class="weui-gallery-img" onclick="$('.weui-gallery').fadeOut(300);"
             src=""  alt="">
        {{--<span onclick="$('.weui-gallery').fadeOut(300);"  class="weui-gallery-img" style=""></span>--}}
    </div>
@endsection



@section('js')

{{--<script>--}}

$('.weui-gallery').fadeOut(0);
function show (ths) {
{{--alert(ths.href);--}}
{{--$('.weui-gallery-img').css("background-image",'url(' + $(ths).attr("alt") + ')');--}}
$('.weui-gallery-img').attr('src',$(ths).attr("alt"));
$('.weui-gallery').fadeIn(300);
{{--return pop() ;--}}
{{--$(ths).attr('src',ths.alt);--}}
}
{{--function test() {--}}
{{--var result ='123';--}}
{{--$('#table').find('tbody').append(result);--}}
{{--}--}}
$(function(){
    var start=0;
    // 每页展示10个
    var size =10;
    $('.weui_panel').dropload({
        scrollArea : window,
        autoLoad : true,//自动加载
        domDown : {//上拉
            domClass   : 'dropload-down',
            domRefresh : '<div class="dropload-refresh f15 "><i class="icon icon-20"></i>上拉加载更多</div>',
            domLoad    : '<div class="dropload-load f15"><span class="weui-loading"></span>正在加载中...</div>',
            domNoData  : '<div class="dropload-noData">没有更多数据了</div>'
        },
        domUp : {//下拉
            domClass   : 'dropload-up',
            domRefresh : '<div class="dropload-refresh"><i class="icon icon-114"></i>上拉加载更多</div>',
            domUpdate  : '<div class="dropload-load f15"><i class="icon icon-20"></i>释放更新...</div>',
            domLoad    : '<div class="dropload-load f15"><span class="weui-loading"></span>正在加载中...</div>'
        },

        loadDownFn : function(me){//加载更多
            window.history.pushState(null, document.title, window.location.href);
            var result = '';
            $.ajax({
                type: 'GET',
                url:'api/order/start/'+start+'/size/'+size,
                dataType: 'json',
                success: function(data){
                    var arrLen = data.length;
                    if(arrLen > 0){
                        for(var i=0; i< arrLen ; i++){
{{--alert((data[i].pictures.length));--}}
                            result+='<tr>'
                                +'<th>ID</th><th>借款人</th> <th>身份证</th> <th>金额</th><th>项目</th> <th>备离单老小</th>'
                                +'<th>图片</th> <th>合伙人_签约人</th> <th>进件时间</th> <th>操作</th>'
                                +'</tr>'
                                +'<tr id="row'+data[i].id+'">'
                                +'<td>'+data[i].id+'</td>'
                                +'<td>'+data[i].name+'</td>'
                                +'<td>'+data[i].idcard+'</td>'
                                +'<td>'+data[i].money+'万元</td>'
                                +'<td>'+data[i].project+'</td>'
                                +'<td>'+data[i].teshu+'</td>'
                                +'<td><a target="_blank" href="pictures/'+data[i].id+'" >图片</a>';
        {{--onclick="show(this)"--}}
                                {{--for(var j = (data[i].pictures.length)-1; j>=0; j--)--}}
                                {{--{--}}
                                    {{--result+='<a  target="_blank" '--}}
                                        {{--+'alt="../uploads/'+data[i].pictures[j]+'"'--}}
                                        {{--+'href="../uploads/'+data[i].pictures[j]+'" >'+j+'  </a>';--}}
                                 {{--}--}}
                                {{--<a href="../pictures/'+data[i].id+'" >1</a>--}}

                            result+='</td>'
                                +'<td>'+data[i].partner_name+'_'+data[i].qianyue_name+'</td>'
                                +'<td>'+data[i].created_at+'</td>'
                                +'<td><a target="_blank"  href="../myadmin/orderpc/'+data[i].id+'"   >审核</a></td>'
                                +'</tr>'
                                +'<tr >'
                                +'<td colspan=10>描述:'+data[i].qingkuang+'</td>'
                                +'</tr >'
                                +'<tr >'
                                +'<td colspan=10>_</td>'
                                +'</tr >';
                        }
                        // 如果没有数据
                    }else{
                        // 锁定
                        me.lock();
                        // 无数据
                        me.noData();
                    }

                    // 为了测试，延迟1秒加载
                    setTimeout(function(){
                        //                        $('.weui_panel_bd').append(result);
                        $('#table').find('tbody').append(result);
                        var lazyloadImg = new LazyloadImg({
                            el: '.weui-updown [data-img]', //匹配元素
                            top: 50, //元素在顶部伸出长度触发加载机制
                            right: 50, //元素在右边伸出长度触发加载机制
                            bottom: 50, //元素在底部伸出长度触发加载机制
                            left: 50, //元素在左边伸出长度触发加载机制
                            qriginal: false, // true，自动将图片剪切成默认图片的宽高；false显示图片真实宽高
                            load: function(el) {
                                el.style.cssText += '-webkit-animation: fadeIn 01s ease 0.2s 1 both;animation: fadeIn 1s ease 0.2s 1 both;';
                            },
                            error: function(el) {

                            }
                        });
                        //
                        // 每次数据加载完，必须重置
                        me.resetload();
                    },1000);
                },
                error: function(xhr, type){
                    alert('Ajax error!');
                    // 即使加载出错，也得重置
                    me.resetload();
                }
            });
            start=start+size;
        }
    });

});

function del(id) {

    $.confirm("您确定要删除吗?", "确认删除?", function() {

        $.showLoading();
        t = setTimeout(function() {
            $.hideLoading();$.toptips("服务无响应，请稍候再试 ");
        }, 10000);
        $.ajax(
            {
                type:"post" ,
                dataType: "json",
                data:
                    {
                        '_method': "DELETE",
                        '_token':"HCUTGPZaWJffmBHZScndIwZ0ahxwEaTj1VWrLRbp"
                    },
                url: "user/"+id,
                success:function(data){
                    clearTimeout(t);
                    $.hideLoading();
                    if(data.status == 0)
                    {
                        $.toptips(data.msg);
                    }
                    else
                    {
                        $.toptips(data.msg,'ok')
                        $("#row"+id).remove();
                    }
                }
            });
    }, function() {

    });

}

@endsection

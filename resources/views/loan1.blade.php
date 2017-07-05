@extends('master')
@section('title','申请')

@section('content')
    <link rel="stylesheet" href="{{asset('css/weui2.css')}}">
    <script src="{{asset('js/zepto.min.js')}}"></script>
    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
    </div>
    <div class="page-bd">
        <ul>

            <li class="">
                <div class="weui-flex js-category">
                    <p class="weui-flex-item">房贷</p>
                    <i class="icon icon-74"></i>
                </div>
                <div class="page-category js-categoryInner">

                    <div class="weui_cells weui_cells_access" style="margin-top: 0px;">
                        {{--<a class="weui_cell" href="javascript:;">--}}
                        <a class="weui_cell" href="{{url('loan1','yidi')}}">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>一抵</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                        <a class="weui_cell" href="{{url('loan1','erdi')}}">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>二抵</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                    </div>

                </div>
            </li>
            <li class="">
                <div class="weui-flex js-category">
                    <p class="weui-flex-item">车贷</p>
                    <i class="icon icon-74"></i>
                </div>
                <div class="page-category js-categoryInner">

                    <div class="weui_cells weui_cells_access" style="margin-top: 0px;">
                        <a class="weui_cell" href="{{url('loan1','gps')}}">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>GPS</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                        <a class="weui_cell" href="{{url('loan1','yache')}}">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>押车</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                    </div>

                </div>
            </li>
            <li class="">
                <div class="weui-flex js-category">
                    <p class="weui-flex-item">信用贷</p>
                    <i class="icon icon-74"></i>
                </div>
                <div class="page-category js-categoryInner">

                    <div class="weui_cells weui_cells_access" style="margin-top: 0px;">
                        <a class="weui_cell" href="javascript:;">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>按揭房(敬请期待)</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                        <a class="weui_cell" href="javascript:;">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>打卡工资(敬请期待)</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                        <a class="weui_cell" href="javascript:;">
                            <div class="weui_cell_bd weui_cell_primary">
                                <p>其他(敬请期待)</p>
                            </div>
                            <div class="weui_cell_ft"></div>
                        </a>
                    </div>

                </div>
            </li>

        </ul>
    </div>

@endsection

@section('js')
    $(function(){
    $('.js-category').click(function(){
    $parent = $(this).parent('li');
    if($parent.hasClass('js-show')){
    $parent.removeClass('js-show');
    $(this).children('i').removeClass('icon-35').addClass('icon-74');
    }else{
    $parent.siblings().removeClass('js-show');
    $parent.addClass('js-show');
    $(this).children('i').removeClass('icon-74').addClass('icon-35');
    $parent.siblings().find('i').removeClass('icon-35').addClass('icon-74');
    }
    });

    });
@endsection
@extends('master')
@section('title','订单')
@section('content')
    <div class="hd">
        <h1 class="page_title">丰纳金融</h1>
    </div>
        <div class="page__bd page__bd_spacing">
            <div class="weui-flex">
                <div class="weui-flex-item"><div class="placeholder">借款人</div></div>
                <div class="weui-flex-item"><div class="placeholder">金额</div></div>
                <div class="weui-flex-item"><div class="placeholder">备离单老小</div></div>
                <div class="weui-flex-item"><div class="placeholder">                    <select class="weui_select" name="select2">
                            <option value="1">+86</option>
                            <option value="2">+80</option>
                            <option value="3">+84</option>
                            <option value="4">+87</option>
                        </select>
                    </div></div>
                <div class="weui-flex-item"><div class="placeholder">合伙人&签约人</div></div>
                <div class="weui-flex-item"><div class="placeholder">图片</div></div>
            </div>
            @foreach ($orders as $order)
            <div class="weui-flex">
                <div class="weui-flex-item"><div class="placeholder">{{ $order->name }}</div></div>
                <div class="weui-flex-item"><div class="placeholder">{{ $order->money }}</div></div>
                <div class="weui-flex-item"><div class="placeholder">{{ $order->teshu }}</div></div>
                <div class="weui-flex-item"><div class="placeholder">{{ $order->status }}</div></div>
                <div class="weui-flex-item"><div class="placeholder">{{ $order->qianyue }}&{{ $order->hehuo }}</div></div>
                <div class="weui-flex-item"><div class="placeholder">{{ $order->status }}</div></div>
            </div>
            @endforeach
        </div>
    {{ $orders->links() }}
@endsection
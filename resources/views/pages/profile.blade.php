@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="title">
        <h1>YOUR ORDERS</h1>
        <a class="logout" href="/logout"><div class="logout-button">LOGOUT</div></a>
    </div>
    <div id="user-items">
        @foreach($orders as $order)
            <div class="user-item">
                @foreach($order->cart->items as $products)
                    @foreach($products as $product)
                        <div class="user-desc">
                            <div class="user-name">
                                <a href="{{url('/shop',$product['item']['id'])}}">
                                    <h1>{{$product['item']['brand']}}&nbsp;</h1>
                                    <h2>{{$product['item']['model']}}&nbsp;</h2>
                                    <h3>{{$product['item']['nickname']}}</h3>
                                </a>
                            </div>
                            <div class="parameters">
                                <a class="openSize1">QUANTITY&nbsp;&nbsp;&nbsp;&nbsp;<span class="openSize">{{$product['qty']}}</span></a>
                            </div>
                            <div class="parameters">
                                <a class="openQuantity1">SIZE&nbsp;&nbsp;&nbsp;&nbsp;<span class="openQuantity">{{$product['size']}}</span></a>
                            </div>
                            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$product['price']}} $</h1>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

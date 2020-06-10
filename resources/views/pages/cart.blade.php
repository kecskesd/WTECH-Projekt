@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    @if(Session::has('cart') and Session::get('cart')->totalQty > 0)
        <div class="title">
            <h1>CART</h1>
        </div>
        <div id="summary">
            <h1>SUMMARY</h1>
            <h2>{{Session::has('cart') ? Session::get('cart')->totalQty : ''}} ITEMS</h2>
            <br>
            <p>SUBTOTAL</p>
            <p class="number">{{$totalPrice}} $</p>
            <br>
            <p class="total">TOTAL</p>
            <p class="total number">{{$totalPrice}} $</p>
            <a href="/checkout"><div class="cart checkout">GO TO CHECKOUT</div></a>
            <a href="{{route('shop')}}"><div class="cart navigation">CONTINUE SHOPPING</div></a>
        </div>
        <div id="items">
            @foreach($products as $productt)
                @foreach($productt as $product)
                    <div class="item">
                        <a href="{{url('/shop',$product['item']['id'])}}">
                            <img src="img/product{{$product['item']['id']}}.jpg" alt="">
                        </a>
                        <div class="item-desc">
                            <a href="{{url('/shop',$product['item']['id'])}}">
                                <h1>{{$product['item']['brand']}}&nbsp;</h1>
                                <h2>{{$product['item']['model']}}</h2>
                            </a>
                            <a href="{{url('/remove', [$product['item']['id'], $product['size']])}}" class="item-icon"><i class="fal fa-times"></i></a>
                            <h3>{{$product['item']['nickname']}}</h3>
                            <h1 class="item-price">{{$product['price']}} $</h1>
                            <div class="parameters">
                                <a id="openSize1_{{$product['item']['id']}}_{{$product['size']}}" class="openSize1">QUANTITY&nbsp;&nbsp;&nbsp;&nbsp;<span id="openSize4_{{$product['item']['id']}}_{{$product['size']}}" class="openSize">{{$product['qty']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="openSize3_{{$product['item']['id']}}_{{$product['size']}}" class="fal fa-angle-down"></i></a>
                                <div id="openSize2_{{$product['item']['id']}}_{{$product['size']}}" class="dropdown-parameters">
                                    <a href="{{url('/changeQty', [$product['item']['id'], '1', $product['size']])}}">1</a>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '6', $product['size']])}}">6</a>
                                    <br>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '2', $product['size']])}}">2</a>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '7', $product['size']])}}">7</a>
                                    <br>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '3', $product['size']])}}">3</a>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '8', $product['size']])}}">8</a>
                                    <br>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '4', $product['size']])}}">4</a>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '9', $product['size']])}}">9</a>
                                    <br>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '5', $product['size']])}}">5</a>
                                    <a href="{{url('/changeQty', [$product['item']['id'], '10', $product['size']])}}">10</a>
                                </div>
                            </div>
                            <div class="parameters">
                                <a id="openQuantity1_{{$product['item']['id']}}_{{$product['size']}}" class="openQuantity1">SIZE&nbsp;&nbsp;&nbsp;&nbsp;<span id="openQuantity4_{{$product['item']['id']}}_{{$product['size']}}" class="openQuantity">{{$product['size']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="openQuantity3_{{$product['item']['id']}}_{{$product['size']}}" class="fal fa-angle-down"></i></a>
                                <div id="openQuantity2_{{$product['item']['id']}}_{{$product['size']}}" class="dropdown-parameters">
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '30', $product['size']])}}">30</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '35', $product['size']])}}">35</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '40', $product['size']])}}">40</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '45', $product['size']])}}">45</a>
                                    <br>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '31', $product['size']])}}">31</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '36', $product['size']])}}">36</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '41', $product['size']])}}">41</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '46', $product['size']])}}">46</a>
                                    <br>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '32', $product['size']])}}">32</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '37', $product['size']])}}">37</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '42', $product['size']])}}">42</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '47', $product['size']])}}">47</a>
                                    <br>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '33', $product['size']])}}">33</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '38', $product['size']])}}">38</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '43', $product['size']])}}">43</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '48', $product['size']])}}">48</a>
                                    <br>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '34', $product['size']])}}">34</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '39', $product['size']])}}">39</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '44', $product['size']])}}">44</a>
                                    <a href="{{url('/changeSize', [$product['item']['id'], $product['qty'], '49'], $product['size'])}}">49</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        let a2_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openSize1_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a3_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openQuantity1_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a4_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openSize2_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a5_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openQuantity2_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a6_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openSize4_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a7_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openQuantity4_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a8_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openSize3_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        let a9_{!!$product['item']['id']!!}_{!!$product['size']!!} = document.getElementById('openQuantity3_{!!$product['item']['id']!!}_{!!$product['size']!!}');
                        $(document).on("click", function () {
                            if ((event.target === a2_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a6_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a8_{!!$product['item']['id']!!}_{!!$product['size']!!}) && a4_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display === 'block')
                                a4_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'none';
                            else if (event.target === a2_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a4_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a6_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a8_{!!$product['item']['id']!!}_{!!$product['size']!!})
                                a4_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'block';
                            else
                                a4_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'none';

                            if ((event.target === a3_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a7_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a9_{!!$product['item']['id']!!}_{!!$product['size']!!}) && a5_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display === 'block')
                                a5_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'none';
                            else if (event.target === a3_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a5_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a7_{!!$product['item']['id']!!}_{!!$product['size']!!} || event.target === a9_{!!$product['item']['id']!!}_{!!$product['size']!!})
                                a5_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'block';
                            else
                                a5_{!!$product['item']['id']!!}_{!!$product['size']!!}.style.display = 'none';
                        });
                    </script>
                @endforeach
            @endforeach
        </div>
    @else
        <div class="title">
            <h1>CART</h1>
        </div>
        <div id="summary" class="inactive">
            <h1>SUMMARY</h1>
            <h2>0 ITEMS</h2>
            <br>
            <p>SUBTOTAL</p>
            <p class="number">0 $</p>
            <br>
            <p class="total">TOTAL</p>
            <p class="total number">0 $</p>
            <a><div class="cart checkout inactive">GO TO CHECKOUT</div></a>
        </div>
        <h1 class="info">There are no items in your cart.<a href="{{route('shop')}}"><div class="cart navigation navigation2">CONTINUE SHOPPING</div></a></h1>

        @include('includes.products')
    @endif
@endsection

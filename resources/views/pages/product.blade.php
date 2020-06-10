@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <nav id="side-pic">
        <img src="/img/product{{$product->id}}.jpg" alt="">
    </nav>
    <div class="title">
        <div class="product-heart-big">
            <p><i class="far fa-heart"></i></p>
        </div>
        <h4><a class="top-links" href="{{route('shop')}}">SHOP</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a class="top-links"  href="{{route('shop', ['brand' => $product->brand])}}">{{$product->brand}}</a></h4>
        <h1>{{$product->brand}}</h1>
        <h2>{{$product->model}}</h2>
        <h3>{{$product->nickname}}</h3>
        <h1 class="tbprice">{{$product->price}} $</h1>
    </div>
    <div id="product-description">
        <div class="parameters parameters-big">
            <a id="openQuantity1" class="openQuantity1">SIZE&nbsp;&nbsp;&nbsp;&nbsp;<span id="openQuantity4" class="openQuantity">30</span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="openQuantity3" class="fal fa-angle-down"></i></a>
            <div id="openQuantity2" class="dropdown-parameters">
                <a onclick="document.getElementById('openQuantity4').innerHTML='30';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '30');">30</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='35';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '35');">35</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='40';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '40');">40</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='45';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '45');">45</a>
                <br>
                <a onclick="document.getElementById('openQuantity4').innerHTML='31';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '31');">31</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='36';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '36');">36</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='41';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '41');">41</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='46';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '46');">46</a>
                <br>
                <a onclick="document.getElementById('openQuantity4').innerHTML='32';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '32');">32</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='37';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '37');">37</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='42';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '42');">42</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='47';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '47');">47</a>
                <br>
                <a onclick="document.getElementById('openQuantity4').innerHTML='33';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '33');">33</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='38';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '38');">38</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='43';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '43');">43</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='48';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '48');">48</a>
                <br>
                <a onclick="document.getElementById('openQuantity4').innerHTML='34';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '34');">34</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='39';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '39');">39</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='44';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '44');">44</a>
                <a onclick="document.getElementById('openQuantity4').innerHTML='49';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('(\\d{2})$'), '49');">49</a>
            </div>
        </div>
        <div class="parameters parameters-big right">
            <a id="openSize1" class="openSize1">QUANTITY&nbsp;&nbsp;&nbsp;&nbsp;<span id="openSize4" class="openSize">1</span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="openSize3" class="fal fa-angle-down"></i></a>
            <div id="openSize2" class="dropdown-parameters">
                <a onclick="document.getElementById('openSize4').innerHTML='1';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '1');">1</a>
                <a onclick="document.getElementById('openSize4').innerHTML='6';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '6');">6</a>
                <br>
                <a onclick="document.getElementById('openSize4').innerHTML='2';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '2');">2</a>
                <a onclick="document.getElementById('openSize4').innerHTML='7';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '7');">7</a>
                <br>
                <a onclick="document.getElementById('openSize4').innerHTML='3';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '3');">3</a>
                <a onclick="document.getElementById('openSize4').innerHTML='8';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '8');">8</a>
                <br>
                <a onclick="document.getElementById('openSize4').innerHTML='4';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '4');">4</a>
                <a onclick="document.getElementById('openSize4').innerHTML='9';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '9');">9</a>
                <br>
                <a onclick="document.getElementById('openSize4').innerHTML='5';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '5');">5</a>
                <a onclick="document.getElementById('openSize4').innerHTML='10';document.getElementById('cart').href=document.getElementById('cart').href.replace(new RegExp('\\d{1,2}(?=\\/\\d{2}$)'), '10');">10</a>
            </div>
        </div>
        <script>
            let c2 = document.getElementById('openSize1');
            let c3 = document.getElementById('openQuantity1');
            let c4 = document.getElementById('openSize2');
            let c5 = document.getElementById('openQuantity2');
            let c6 = document.getElementById('openSize4');
            let c7 = document.getElementById('openQuantity4');
            let c8 = document.getElementById('openSize3');
            let c9 = document.getElementById('openQuantity3');
            $(document).on("click", function () {
                if ((event.target === c2 || event.target === c6 || event.target === c8) && c4.style.display === 'block')
                    c4.style.display = 'none';
                else if (event.target === c2 || event.target === c4 || event.target === c6 || event.target === c8)
                    c4.style.display = 'block';
                else
                    c4.style.display = 'none';

                if ((event.target === c3 || event.target === c7 || event.target === c9) && c5.style.display === 'block')
                    c5.style.display = 'none';
                else if (event.target === c3 || event.target === c5 || event.target === c7 || event.target === c9)
                    c5.style.display = 'block';
                else
                    c5.style.display = 'none';
            });
        </script>
        <a id="cart" href="{{url('/add', [$product['id'], '1', '30'])}}"><div class="cart">ADD TO CART</div></a>
        <h1>DETAILS</h1>
        <p>{{$product->details}}</p>
        <br>
        <p><span class="name-sizing">GENDER:</span>{{$product->gender}}</p>
        <p><span class="name-sizing">COLOR:</span>{{$product->color}}</p>
        <p><span class="name-sizing">SKU:</span>{{$product->sku}}</p>
        <br>
        <a href="#" class="bonus"><i class="fal fa-shipping-fast icon-sizing"></i> FREE SHIPPING ON ORDERS OVER 100$</a>
        <a href="#" class="bonus"><i class="fal fa-usd-circle icon-sizing"></i> 30 DAY MONEY BACK GUARANTEE</a>
        <a href="#" class="bonus"><i class="fal fa-lock-alt icon-sizing"></i> SECURE PAYMENT OPTIONS</a>
    </div>
@endsection

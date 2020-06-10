
@if(!Request::is('shop'))
    <div class="title title-fix">
        <h1>TOP SELLERS</h1>
    </div>
@endif
@if(Request::is('shop'))
    <div class="title">
        <h1>SHOP SNEAKERS</h1>
        <nav id="top-nav">
            <div class="top-dropdown">
                <a class="sort-mobile">SORT BY:&nbsp;</a><a class="top-grey">
                        @if(request('price') == '')
                            Newest
                        @elseif(request('price') == 'asc')
                            Low-High Price
                        @elseif(request('price') == 'desc')
                            High-Low Price
                        @endif
                    </a>&nbsp;<i class="fal fa-angle-down top-grey"></i>
                <div class="dropdown-content">
                    <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => 'desc'])}}">Newest</a>
                    <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'price' => 'asc'])}}">Low-High Price</a>
                    <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'price' => 'desc'])}}">High-Low Price</a>
                </div>
            </div>
        </nav>
    </div>
@endif

<div id="products">
    @foreach($products as $product)
        <a href="{{url('/shop', $product['id'])}}" class="product">
            <div class="product-heart">
                <p><i class="far fa-heart"></i></p>
            </div>
            <div class="product-desc">
                <p class="bold-name">{{$product['brand']}}</p>
                <p class="thin-name">{{$product['model']}}</p>
                <p class="color-name">{{$product['nickname']}}</p>
                <p class="price">{{$product['price']}} $</p>
                <p class="sale price"></p>
            </div>
            <img src="/img/{{$product['id']}}.jpg" alt="">
        </a>
    @endforeach
</div>

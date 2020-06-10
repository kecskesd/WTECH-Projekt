<header>
    <div id="header">
        <div class="left center">
            <a class="top0" onclick="openNav()"><i class="far fa-bars"></i></a>
            <a class="top1" href="{{route('shop', ['collection' => 'On Sale'])}}">ON SALE</a>
            <a class="top2" href="{{route('shop', ['collection' => 'New Releases'])}}">NEW RELEASES</a>
            <a class="top3" href="{{route('shop')}}">ALL SNEAKERS</a>
        </div>
        <div class="right center">
            <a href="{{route('shop')}}"><i class="far fa-search"></i></a>
            @if(Auth::user())
                <a href="/profile"><i class="far fa-user-circle"></i></a>
            @endif
            @if(Auth::guest())
                <a onclick="document.getElementById('login-window').style.display='block'"><i class="far fa-user-circle"></i></a>
            @endif
            <a href="/cart"><i class="far fa-shopping-bag"></i>
                @if(Session::has('cart') and Session::get('cart')->totalQty > 0)
                <a href="/cart" class="cart-number">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</a>
                @endif
            </a>
        </div>
        <div class="logo center">
            <a href="/">
                <picture>
                    <source media="(max-width: 500px)" srcset="/img/mobilelogo.svg">
                    <img src="/img/logo.svg" alt="Flowers">
                </picture>
            </a>
        </div>
    </div>
    <div id="brands">
        <a href="{{route('shop', ['brand' => 'Nike'])}}">NIKE</a>
        <a href="{{route('shop', ['brand' => 'Adidas'])}}">ADIDAS</a>
        <a href="{{route('shop', ['brand' => 'Air Jordan'])}}">AIR JORDAN</a>
        <a href="{{route('shop', ['brand' => 'Yeezy'])}}">YEEZY</a>
        <a href="{{route('shop', ['brand' => 'Vans'])}}">VANS</a>
        <a href="{{route('shop')}}">MORE</a>
        <a href="{{route('shop', ['gender' => 'Men'])}}">MEN</a>
        <a href="{{route('shop', ['gender' => 'Women'])}}">WOMEN</a>
    </div>
    <script>
        function openNav() {
            document.getElementById('mobile-window').style.display = 'block'
            document.getElementById("mobile-nav").style.width = "26rem";
        }
    </script>
</header>

@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="title">
        <h1>CHECKOUT</h1>
    </div>
    <script>
        function checkout() {
            if(document.getElementsByName("first")[0].value !== "" && document.getElementsByName("last")[0].value !== "" && document.getElementsByName("mail")[0].value !== "" && document.getElementsByName("phone")[0].value !== "" && document.getElementsByName("address")[0].value !== "" && document.getElementsByName("postcode")[0].value !== "" && document.getElementsByName("city")[0].value !== "")
                document.getElementById('pay-window').style.display='block';
            document.getElementById("first-last").innerHTML = document.getElementsByName("first")[0].value+' '+document.getElementsByName("last")[0].value;
            document.getElementById("mail").innerHTML = document.getElementsByName("mail")[0].value;
            document.getElementById("phone").innerHTML = document.getElementsByName("phone")[0].value;
            document.getElementById("address").innerHTML = document.getElementsByName("address")[0].value;
            document.getElementById("city").innerHTML = document.getElementsByName("postcode")[0].value+' '+document.getElementsByName("city")[0].value;
        }
    </script>
    <div class="wrapper">
        <div class="address section sections">
            <h1>BILLING</h1>
            <h2>Enter yor billing information or <a class="text-login" onclick="document.getElementById('login-window').style.display='block'">LOG IN</a></h2>
            <form id="user" action="/order" novalidate="novalidate">
                <div class="textfield">
                    <input name="first" type="text" required>
                    <span class="bar"></span>
                    <label>First name</label>
                </div>
                <div class="textfield">
                    <input name="last" type="text" required>
                    <span class="bar"></span>
                    <label>Last name</label>
                </div>
                <div class="textfield">
                    <input name="mail" type="text" required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="textfield">
                    <input name="phone" type="text" required>
                    <span class="bar"></span>
                    <label>Phone number</label>
                </div>
                <div class="textfield">
                    <input name="address" type="text" required>
                    <span class="bar"></span>
                    <label>Address line</label>
                </div>
                <div class="textfield">
                    <input name="city" type="text" required>
                    <span class="bar"></span>
                    <label>City</label>
                </div>
                <div class="textfield">
                    <input name="postcode" type="text" required>
                    <span class="bar"></span>
                    <label>Postcode</label>
                </div>
            </form>
        </div>
        <div class="final-summary section sections">
            <h1>SUMMARY</h1>
            <h2>{{Session::has('cart') ? Session::get('cart')->totalQty : ''}} ITEMS</h2>
            <br>
            <p>SUBTOTAL</p>
            <p class="number">{{$totalPrice}} $</p>
            <br>
            <p>SHIPPING</p>
            <p id="ship" class="number">10 $</p>
            <br>
            <p class="total">TOTAL</p>
            <p id="total" class="total number">{{$totalPrice+10}} $</p>
            <a onclick="checkout()"><div class="cart checkout">ORDER SUMMARY</div></a>
        </div>
        <div class="shipping-payment section">
            <div class="sections">
                <h1>SHIPPING</h1>
                <h2>Choose yor preferred shipping method</h2>
                <label onclick="document.getElementById('ship').innerHTML='10 $';document.getElementById('ship2').innerHTML='10 $';document.getElementById('total').innerHTML='{{$totalPrice+10}} $';document.getElementById('total2').innerHTML='{{$totalPrice+10}} $';document.getElementById('shipping').innerHTML='Standard'" class="radiobutton"><a class="label-mobile">Standard shipping </a><a class="label-thin">(2 - 5 days)</a><a class="label-bold">10 $</a>
                    <input form="user" value="Standard" type="radio" name="shipping" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <label onclick="document.getElementById('ship').innerHTML='20 $';document.getElementById('ship2').innerHTML='20 $';document.getElementById('total').innerHTML='{{$totalPrice+20}} $';document.getElementById('total2').innerHTML='{{$totalPrice+20}} $';document.getElementById('shipping').innerHTML='Overnight'" class="radiobutton"><a class="label-mobile">Overnight shipping </a><a class="label-thin">(1 - 2 days)</a><a class="label-bold">20 $</a>
                    <input form="user" value="Overnight" type="radio" name="shipping">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="payment sections">
                <h1>PAYMENT</h1>
                <h2>Choose yor preferred payment method</h2>
                <label onclick="document.getElementById('payment').innerHTML='Credit card'" class="radiobutton">Credit card
                    <input form="user" value="Credit card" type="radio" name="payment" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <label onclick="document.getElementById('payment').innerHTML='PayPal'" class="radiobutton">PayPal
                    <input form="user" value="PayPal" type="radio" name="payment">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
@endsection

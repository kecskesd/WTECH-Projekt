<div id="pay-window">
    @if(Request::is('checkout'))
        <div id="wrap">
            <div id="scroll">
                <div id="pay">
                    <i onclick="document.getElementById('pay-window').style.display = 'none'" class="fal fa-times close"></i>
                    <h1>ORDER SUMMARY</h1>
                    <br>
                    <div class="payleft">
                        <div class="left">
                            <p id="first-last" class="control bold-control">&nbsp;</p>
                            <p id="mail" class="control">&nbsp;</p>
                            <p id="phone" class="control">&nbsp;</p>
                            <p id="address" class="control">&nbsp;</p>
                            <p id="city" class="control">&nbsp;</p>
                        </div>
                        <div class="summ right">
                            <p class="control bold-control">Shipping</p>
                            <p id="shipping" class="control">Standard</p>
                            <p class="control">&nbsp;</p>
                            <p class="control bold-control">Payment</p>
                            <p id="payment" class="control">Credit card</p>
                        </div>
                        <div class="clear">
                            <br>
                            <br>
                            <p class="control bold-control bold-cont">Items</p>
                            @foreach($products as $productt)
                                @foreach($productt as $product)
                                    <p class="control extra">{{$product['item']['brand']}} {{$product['item']['model']}} {{$product['item']['nickname']}}</p>
                                    <p class="control cont">QTY:&nbsp;&nbsp;{{$product['qty']}}</p>
                                    <p class="control cont">SIZE:&nbsp;&nbsp;{{$product['size']}}</p>
                                    <p class="control right">{{$product['price']}} $</p>
                                @endforeach
                            @endforeach
                            <p class="control extra">Shipping</p>
                            <p class="control cont">Standard</p>
                            <p id="ship2" class="control right">10 $</p>
                            <p class="control control-br">&nbsp;</p>
                            <p class="control bold-control bold-cont control-total">TOTAL</p>
                            <p id="total2" class="control bold-control bold-cont control-total right">{{$totalPrice+10}} $</p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <input type="hidden" form="user" value="{{$totalPrice}}" name="price">
                    <button class="place" form="user" type="submit">PLACE ORDER</button>
                </div>
            </div>
        </div>
    @endif
</div>

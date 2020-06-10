<nav id="side-nav">
    @if($filters['collection'] == '')
        <p class="filter-name">COLLECTION<i class="fal fa-angle-down icon-rotate"></i></p>
        <div class="filter-panel fix">
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'collection' => 'New Releases'])}}">New Releases</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'collection' => 'On Sale'])}}">On Sale</a>
        </div>
    @else
        <p class="filter-name">COLLECTION<a href="{{route('shop', ['brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}"><span class="icon-right">X</span></a></p>
        <div class="filter-panel">
            <a href="{{route('shop', ['brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}">{{request('collection')}}</a>
        </div>
    @endif
    @if($filters['brand'] == '')
        <p class="filter-name">BRAND<i class="fal fa-angle-down icon-rotate"></i></p>
        <div class="filter-panel fix">
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Nike'])}}">Nike</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Adidas'])}}">Adidas</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Air Jordan'])}}">Air Jordan</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Yeezy'])}}">Yeezy</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Vans'])}}">Vans</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Converse'])}}">Converse</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Reebok'])}}">Reebok</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'brand' => 'Puma'])}}">Puma</a>
        </div>
    @else
        <p class="filter-name">BRAND<a href="{{route('shop', ['collection' => request('collection'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}"><span class="icon-right">X</span></a></p>
        <div class="filter-panel">
            <a href="{{route('shop', ['collection' => request('collection'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}">{{request('brand')}}</a>
        </div>
    @endif
    <!--@if($filters['size'] == '')
        <p class="filter-name">SIZE<i class="fal fa-angle-down icon-rotate"></i></p>
        <div class="filter-panel fix">
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '30'])}}" class="sizes">30</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '37'])}}" class="sizes">37</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '44'])}}" class="sizes">44</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '31'])}}" class="sizes">31</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '38'])}}" class="sizes">38</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '45'])}}" class="sizes">45</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '32'])}}" class="sizes">32</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '39'])}}" class="sizes">39</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '46'])}}" class="sizes">46</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '33'])}}" class="sizes">33</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '40'])}}" class="sizes">40</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '47'])}}" class="sizes">47</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '34'])}}" class="sizes">34</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '41'])}}" class="sizes">41</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '48'])}}" class="sizes">48</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '35'])}}" class="sizes">35</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '42'])}}" class="sizes">42</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '49'])}}" class="sizes">49</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '36'])}}" class="sizes">36</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '43'])}}" class="sizes">43</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'size' => '50'])}}" class="sizes">50</a>
        </div>
    @else
            <p class="filter-name">SIZE<a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}"><span class="icon-right">X</span></a></p>
            <div class="filter-panel">
                <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}">{{request('size')}}</a>
            </div>
    @endif-->
    @if($filters['color'] == '')
        <p class="filter-name">COLOR<i class="fal fa-angle-down icon-rotate"></i></p>
        <div class="filter-panel fix">
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'White'])}}">White</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Black'])}}">Black</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Green'])}}">Green</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Blue'])}}">Blue</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Grey'])}}">Grey</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Red'])}}">Red</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'color' => 'Gold'])}}">Gold</a>
        </div>
    @else
            <p class="filter-name">COLOR<a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}"><span class="icon-right">X</span></a></p>
            <div class="filter-panel">
                <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price')])}}">{{request('color')}}</a>
            </div>
    @endif
    @if($filters['gender'] == '')
        <p class="filter-name">GENDER<i class="fal fa-angle-down icon-rotate"></i></p>
        <div class="filter-panel fix">
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'gender' => 'Men'])}}">Men</a>
            <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'gender' => request('gender'), 'id' => request('id'), 'price' => request('price'), 'gender' => 'Women'])}}">Women</a>
        </div>

    @else
            <p class="filter-name">GENDER<a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'id' => request('id'), 'price' => request('price')])}}"><span class="icon-right">X</span></a></p>
            <div class="filter-panel">
                <a href="{{route('shop', ['collection' => request('collection'), 'brand' => request('brand'), 'size' => request('size'), 'color' => request('color'), 'id' => request('id'), 'price' => request('price')])}}">{{request('gender')}}</a>
            </div>
    @endif
</nav>

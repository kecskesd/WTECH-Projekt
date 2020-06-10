<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Session;
use App\User;
use App\Size;
use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getHome(){
        $products = Product::orderBy('id', 'desc')->take(6)->get();
        return view('pages.home', ['products' => $products]);
    }

    public function getShop(){
        $products = new Product;
        $sorting = [];
        $values = [];

        $filters = ['collection', 'brand', 'size', 'color', 'gender',];

        foreach($filters as $filter) {
            if(request()->has($filter)) {
                $values[$filter] = request($filter);
                $sorting[$filter] = request($filter);
                $products = $products->where($filter, request($filter));
            }
            else {
                $values[$filter] = '';
            }
        }

        $sorts = ['id', 'price',];

        foreach($sorts as $sort)
            if(request()->has($sort)) {
                $sorting[$sort] = request($sort);
                $products = $products->orderBy($sort, request($sort));
            }

        $products = $products->paginate(12)->appends($sorting);
        return view('pages.shop', ['products' => $products, 'filters' => $values]);
    }

    public function getProduct($id){
        $product = Product::find($id);
        $size = Size::find($id);
        return view('pages.product', ['product' => $product, 'size' => $size]);
    }

    public function getCart() {
        if(!Session::has('cart') or Session::get('cart')->totalQty == 0) {
            $products = Product::orderBy('id', 'desc')->take(6)->get();
            return view('pages.cart', ['products' => $products]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if (!Session::has('cart'))
            return view('pages.home');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getAdd(Request $request, $id, $qty, $size){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $qty, $size);
        $request->session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function getRemove($id, $size){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id, $size);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function getChangeSize(Request $request, $id, $qty, $size, $currsize){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->changeSize($product, $product->id, $qty, $size, $currsize);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getChangeQty($id, $qty, $size){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->changeQty($id, $qty, $size);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function getOrder(Request $request){
        $this->validate($request, [
            'mail' => 'email|required',
            'first' => 'required',
            'last' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);
        if (!Session::has('cart'))
            return redirect('/cart');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order = new Order();
        if(User::where('email', $request->input('mail'))->first())
            $user = User::where('email', $request->input('mail'))->first();
        else {
            $user = new User();
            $user->email = $request->input('mail');
            $user->save();
            $user = User::where('email', $request->input('mail'))->first();
        }
        $order->user_id = $user->id;
        $order->cart = base64_encode(serialize($cart));
        $order->payment = $request->input('payment');
        $order->shipping = $request->input('shipping');
        $user->first_name = $request->input('first');
        $user->last_name = $request->input('last');
        $user->email = $request->input('mail');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->postcode = $request->input('postcode');
        $user->save();
        $order->save();
        Session::forget('cart');
        return redirect('/')->with('message', 'Order was placed');
    }

    public function list($page) {
        $rowsPerPage = request('rowsPerPage', 5);
        $sortBy = request('sortBy', 'id');
        $descendingBool = request('descending', 'false');
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        if ($rowsPerPage == 0) {
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
        $rowsNumber = DB::table('products')->count();
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }

    public function destroy(Product $product) {
        $image_path = public_path().'\\img\\'.$product->id.'.jpg';
        unlink($image_path);
        $product->delete();
        return response()->json(['status'=>'success','msg' => 'Product deleted successfully']);
    }

    public function store(Request $request) {
        $request->validate([
            'collection' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'nickname' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'details' => 'required',
            'sku' => 'required',
            'price' => 'required',
        ]);

        $product = Product::create([
            'collection' => $request->collection,
            'brand' => $request->brand,
            'model' => $request->model,
            'nickname' => $request->nickname,
            'color' => $request->color,
            'gender' => $request->gender,
            'details' => $request->details,
            'sku' => $request->sku,
            'price' => $request->price
            ]);
        return response()->json(['id' => $product->id]);
    }

    public function edit(Product $product) {
        return response()->json($product);
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'collection' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'nickname' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'details' => 'required',
            'sku' => 'required',
            'price' => 'required',
        ]);

        $product->collection = $request->collection;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->nickname = $request->nickname;
        $product->color = $request->color;
        $product->gender = $request->gender;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->save();
    }

    public function uploadSmall(Request $request, $action, Product $product) {
        $request->validate([
            'image' => 'required'
        ]);

        $image_path = public_path().'\\img\\'.$product->id.'.jpg';
        if($action === 'e')
            unlink($image_path);

        $request->image->storeAs(
            '/', $product->id.'.jpg', 'product'
        );
    }

    public function uploadLarge(Request $request, $action, Product $product) {
        $request->validate([
            'image' => 'required'
        ]);

        $image_path = public_path().'\\img\\'.$product->id.'.jpg';
        if($action === 'e')
            unlink($image_path);

        $request->image->storeAs(
            '/', '/product'.$product->id.'.jpg', 'product'
        );
    }

}

<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getProfile(){
        $orders = Order::where('user_id', Auth::id())->get();
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('pages.profile', ['orders' => $orders]);
    }

    public function getLogin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect()->back()->with('message', 'Login successful');
        return redirect('/')->with('message', 'Login not successful');
    }

    public function getRegister(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:5',
        ]);

        if(User::where('email', $request->input('email'))->first() && User::where('email', $request->input('email'))->first()->password == null) {
            $user = User::where('email', $request->input('email'))->first();
            $user->password = bcrypt($request->input('password'));
            $user->save();
            Auth::login($user);
            return redirect('/profile');
        }

        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        Auth::login($user);
        return redirect('/profile');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->back()->with('message', 'Logout successful');
    }

}

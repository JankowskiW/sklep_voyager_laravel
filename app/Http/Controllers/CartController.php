<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;

class CartController extends Controller
{

    public function show()
    {
        /* KOSZYK Z UŻYCIEM SESJI
        if(!Session::has('cart')){
            return view('cart', ['product' => null]);
        }
        $oldCart = Session::get('cart');
//        dd($oldCart);
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
        */
        /* KOSZYK Z UŻYCIEM CIASTECZEK */

//        $cookie_name = "cart";
//        if(!isset($_COOKIE[$cookie_name]))
//        {
//            return view('cart', ['product' => null]);
//        }
//        $oldCart = json_decode($_COOKIE[$cookie_name],true);
//        $cart = new Cart($oldCart);
//        return view('cart', ['products' =>$cart->items,'totalPrice'=>$cart->totalPrice]);

        return view('cart');
    }
}

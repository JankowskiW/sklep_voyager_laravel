<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    function show()
    {
        if (!empty($_GET['categoryId'])) {
            $products = Product::where('category_id', $_GET['categoryId'])->get();
        } else {
            $products = Product::take(3)->get();
        }

        return view('products', compact('products'));
    }

    function showProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->get()[0];
        return view('product-page', compact('product'));
    }

    public function addToCart(Request $request, $id)
    {
//        /* KOSZYK NA SESJI*/
//        $product = Product::find($id);
//        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new Cart($oldCart);
//        $cart->add($product, $product->id);
//
//        $request->session()->put('cart', $cart);
//        $request->session()->save();
//        dd($request->session()->get('cart'));
//        return redirect()->back();

        /* KOSZYK NA CIASTECZKACH */

        $cookie_name = 'cart';
        $minutes = 120;
        $product = Product::find($id);
        $oldCart = isset($_COOKIE[$cookie_name]) ? json_decode($_COOKIE[$cookie_name], true) : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $shoppingCart = [
            "items" => $cart->items,
            "totalPrice" => $cart->totalPrice,
            "totalQty" => $cart->totalQty];
//        dd(json_encode($shoppingCart));
        return redirect()->back()
            ->cookie($cookie_name, "[AA, BB], [CC, DD]", $minutes, '/', null, false, false);
    }
}

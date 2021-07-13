<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // session()->push('products', $request->product_id);
        $product = Product::where('id', $request->product_id)->first();

          Cart::add([
            ['id' => $request->product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price * 100, 'weight' => 0],
            // ['id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'weight' => 550, 'options' => ['size' => 'large']]
          ]);

        return redirect('products');
    }

    public function list()
    {


        // dd(Cart::content());
        $cart_list = Cart::content();
        // $total = 0;
        // $products = Product::whereIn('id', session('products'))->get();
        // foreach ($products as $product) {
        //     $total += $product->price;
        // }
        return view('cart', ['cart_list' => $cart_list]);
    }

    public function delete($rowId)
    {
        // dd(session('products'));
        // session()->forget('products', 3);
        Cart::remove($rowId);
        return redirect('cart');
    }
}

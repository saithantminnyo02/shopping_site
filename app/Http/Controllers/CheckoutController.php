<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Product;
use DB;
use App\ProductUser;

class CheckoutController extends Controller
{

    public function charge(Request $request, $total)
    {
        try {
            // $cart_list = Cart::content();
            $description = "";
            $i = 1;
            $user_id = Auth::user()->id;
            foreach(Cart::content() as $row) {
                $description .=  'Id ' . $row->id . ':' . $row->name . '(' .($row->price/100) .')Kyats | ' . Auth::user()->address;
                $product = Product::find($row->id);

                $product->users()->sync([$user_id => ['remark' => 'card'] ], false);
                $i += 1;

            }
            // dd($description);
            // dd($cart_list);
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));


        
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $total,
                'description' => $description,
                'currency' => 'MMK'
            ));

            Cart::destroy();
        
            return redirect()->route('orderHistory');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function storeInOrderHistory()
    {
        $user_id = Auth::user()->id;
        foreach(Cart::content() as $row) {
            $product = Product::find($row->id);

            $product->users()->sync($user_id);


        }
        
        Cart::destroy();
        return redirect()->route('orderHistory');
        
    }

}
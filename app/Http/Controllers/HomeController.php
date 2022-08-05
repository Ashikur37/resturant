<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome',compact('sliders','categories','items'));


    }
    public function addToCart(Request $request){
        $item=Item::find($request->id);
        $qty=$request->qty;
        $price=$item->price;
        \Cart::add($item->id,$item->name,$qty,$price);
        return \Cart::count();
    }
    //cart
    public function cart(){

        return view('cart');
    }
    //cartDestroy
    public function cartDestroy($id){
        \Cart::remove($id);
        return back()->with('success','Item has been removed');
    }
    public function cartIncrement(){
        $cart=\Cart::get(request()->id);
        \Cart::update(request()->id,$cart->qty+1);
        return view('cart-table');
    }
    //cartDecrement
    public function cartDecrement(){
        $cart=\Cart::get(request()->id);
        \Cart::update(request()->id,$cart->qty-1);
        return view('cart-table');
    }
    public function checkout(){
        return view('checkout');
    }
    public function checkoutSubmit(Request $request){
        $order=Order::create([
            "user_id"=>auth()->user()->id,
            "payment_method"=>$request->payment_method,
            "shipping_address"=>$request->shipping_address,
            "total"=>\Cart::total()
        ]);
        foreach (\Cart::content() as $cart){
            OrderItem::create([
                "order_id"=>$order->id,
                "item_id"=>$cart->id,
                "quantity"=>$cart->qty,
                "price"=>$cart->price
            ]);
        }
        //cart clear
        \Cart::destroy();
        return view('order_success',compact('order'));
    }
}

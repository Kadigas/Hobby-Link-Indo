<?php

namespace App\Http\Controllers;

use App\Models\CartOrder;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartServiceProvider;

class CartOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\CartOrder $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
        ]);

        $cart_order = new CartOrder();

        $cart_order->total_price = \Cart::session(auth()->id())->getTotal();
        $cart_order->shipping_address = $request->input('shipping_address');
        $cart_order->status = 'Waiting';
        $cart_order->shipping_cost = 360;
        $cart_order->user_id = auth()->id();

        $cart_order->save();

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $temp){
            $cart_order->items()->attach($temp->id, ['price' => $temp->price, 'quantity' => $temp->quantity,]);
        }

        //clear cart
        \Cart::session(auth()->id())->clear();

        return view('cart_order.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\CartOrder $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CartOrder $cartOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\CartOrder $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CartOrder $cartOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\CartOrder $cartOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartOrder $cartOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}

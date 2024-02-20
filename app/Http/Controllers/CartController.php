<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $order = null;
        $orderId = session('orderId');
        if (!is_null($orderId) && !is_null($order = Order::find($orderId))) {
            $order = Order::findOrFail($orderId);
            return view('cart',compact('order'));
        }
        else{
            return view('cart',compact('order'));
        }
    }

    public function cartPlace()
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect(route('index'))->with('error', 'Please add products to the cart before ordering!');
        }
        $order = Order::findOrFail($orderId);
        return view('orders', compact('order'));
    }

    public function cartAdd($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $qnty = $order->products()->where('product_id', $productId)->first()->pivot;
            $qnty->count++;
            $qnty->update();
        } else {
            $order->products()->attach($productId);
        }
        $product = Product::find($productId);
        session()->flash('success','You Add' . $product->name);

        return redirect()->route('cart');
    }

    public function cartMinus($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $qnty = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($qnty->count < 2) {
                $order->products()->detach($productId);
            } else {
                $qnty->count--;
                $qnty->update();
            }
        }

        return redirect()->route('cart');
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);
        if($success){
            session()->flash('success','Your order has been successfully processed! We will contact you as soon as possible. Thank You for your purchase!');
        }
        else{
            session()->flash('error','Error while processing');
        }
        return redirect('');
    }
}

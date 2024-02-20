<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order()
    {
        $orders = Order::whereIn('status', ['pending', 'approved'])->get();
        return view('admin.dashboard.order', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->id);
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $order->status = 'Approved';
        if (!$order->save()) {
            return redirect()->back()->with('error', 'Failed to update order status.');
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    public function createCategories(){
        $categories = Categories::all();
        return view('categories.create', compact('categories'));
    }
}


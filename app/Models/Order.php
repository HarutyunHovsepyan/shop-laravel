<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function orderSum()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getTotalProductAmount($product->pivot->count);
        }
        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        $this->name =  $name;
        $this->phone =  $phone;
        $this->status = 'pending';
        $this->save();
        session()->forget('orderId');
        return true;
    }
}

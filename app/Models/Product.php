<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{

    use HasRoles;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'price',
        'description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalProductAmount($count){
        return $this->price * $count;
    }
}

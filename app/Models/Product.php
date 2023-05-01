<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    //protected $guarded = [];
    protected $fillable = ['title', 'price', 'description'];

    public function shopping_carts()
    {
        return $this->belongsToMany(ShoppingCart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}

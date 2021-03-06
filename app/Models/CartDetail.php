<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function productCart(){
     return $this->belongsTo(Product::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'date_added',
        'sale_unit_price',

    ];

}

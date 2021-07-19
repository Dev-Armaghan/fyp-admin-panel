<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    public $timestamps=false;

    //making belongs to relation with Product
    public function productPurchase()
    {
        return $this->belongsTo(Product::class); 
    }

    // making belongs to relation with Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class); 
    }
}

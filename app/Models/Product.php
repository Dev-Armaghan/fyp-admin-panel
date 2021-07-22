<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps=false;

    // 1:m with purchase_details
    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseDetail::class); 
    }

    // 1:m with current_stocks
    public function currentStock()
    {
        return $this->hasOne(CurretStock::class);
    }

    // 1:m with sale_details

    // 1:m with the cart_details
     public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }

}

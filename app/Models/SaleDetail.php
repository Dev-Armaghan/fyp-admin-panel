<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    public $incrementing=false;
    public $timestamps=false;

    public function productSale(){
        return $this->belongsTo(Product::class);
    }
    
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}

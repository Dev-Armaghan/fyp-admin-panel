<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function saleDetail(){
        return $this->hasOne(Cart::class);
    }
    
}

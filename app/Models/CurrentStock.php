<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentStock extends Model
{
    use HasFactory;
    public $incrementing=false;
    public $timestamps=false;
    
    // making belongs to relation with Products

    public function productStock(){
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    public $timestamps=false;

    public function purchaseDetail() {
        return $this->hanOne(PurchaseDetail::class);
    }

    public function vendor(){
        $this->belongsTo(Vendor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    public $timestamps=false;

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    protected $fillable = ['user_id','date_modified'];
}

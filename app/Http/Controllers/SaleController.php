<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    //

    public function todayOrders(){
        $dt = new DateTime();
        $dt = $dt->format('Y-m-d H:i:s');
        return $dt;
        $order=Sale::all()
        ->where('sale_date',)
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //

    public function todayOrders(){
        // $date=Carbon::now();
        // return $date->toDateString();

        $ldate = date('d-m-y');
        $todayOrders=DB::table('sales')
        ->join('users','sales.user_id','=','users.id')
        ->select('address')
        ->where('sale_date',$ldate)
        ->get();
        return view('totalOrders',['collection'=>$todayOrders]);
        
    }
}

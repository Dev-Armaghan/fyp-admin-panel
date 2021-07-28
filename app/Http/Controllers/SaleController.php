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
        ->join('carts','sales.cart_id','=','carts.id')
        ->join('users','carts.user_id','=','users.id')
        ->select('user_name','email','total_price','user_address','sale_date')
        ->where('sale_date',$ldate)
        ->where('status','delivered')
        ->get();
        return view('totalOrders',['collection'=>$todayOrders]);
        
    }
    public function newOrders(){

        $ldate = date('d-m-y');
        $todayOrders=DB::table('sales')
        ->join('carts','sales.cart_id','=','carts.id')
        ->join('users','carts.user_id','=','users.id')
        ->select('total_price','user_address','sales.id','cart_id')
        ->where('sale_date',$ldate)
        ->where('status','pending')
        ->get();
        return view('orders',['collection'=>$todayOrders]);

    }
}

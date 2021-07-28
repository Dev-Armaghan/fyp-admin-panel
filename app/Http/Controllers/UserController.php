<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function viewUsers(){
        $user=User::all();
        return view('users',['collection'=>$user]);
    }

    public function search(Request $req){

        $user=DB::table('users')
        ->where('user_name','like','%'.$req->search.'%')
        ->orWhere('email','like','%'.$req->search.'%')
        ->get();
       return view('searchedUser',['collection'=>$user]);

    }
}

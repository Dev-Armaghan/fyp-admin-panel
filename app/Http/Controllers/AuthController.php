<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Mail\Message;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    //
    public function register(Request $request){
     
        $rules = [
            'user_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
          ];

          $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
            $data = $validator->errors()->first();
            return collect([
              'status' => false,
              'message' => $data
            ]);
          }
        try {
            $user = User::create([
                'user_name' => $request->input('user_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            $token = $user->createToken('app')->accessToken;

            return response([
                'status' => true,
                'message' => 'Success',
                'token' => $token,
                'user' => $user
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
    public function login(Request $request){
        $rules=[
                    'email' => 'required|email|exists:users',
                    'password' => 'required|min:8'
        ];
        
            $validator = Validator::make($request->all(),$rules);

            if($validator->fails()){
                $message = $validator->errors();
                return response([
                    'status' => false,
                    'message' =>$message->first()
                ],401);
            }

            try {
            if(!Auth::attempt($request->only('email','password'))){   
                return response([
                    'status' => false,
                    'message' => 'Invalid Password'
                ],401);
            }
                // /** @var User $user */
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                return response([
                    'status' => true,
                    'message' => 'Success',
                    'token' => $token,
                    'user' => $user
                ]);

        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
    public function search(Request $request){
        if ($request->search){
            $search=$request->search;
            $products=Product::where('product_name','like','%'.$search.'%')
            ->join('purchase_details','products.id','=','purchase_details.product_id')
            ->join('purchases','purchase_details.purchase_id','=','purchases.id')
            ->join('vendors','purchases.vendor_id','=','vendors.id')
            ->select('product_name','category','img','qty','unit_price','vendor_name','purchase_date')
            ->get();
            return response([
                'status' => true,
                'data' => $products,
            ]);
        }
        else {
            return response([
                'status' => false,
                'data' => Product::all(),
            ]);
        }
    }
    public function forgot(Request $request){
        $email = $request->input('email');
        if(User::where('email', $email)->doesntExist()){
            return response([
                'status' => false,
                'message' => 'User doen\'t exists'
            ], 404);
        }
        $token = Str::random(6);

        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::send('forgot', ['token' => $token], function (Message $message) use ($email){
                $message->to($email);
                $message->subject('Reset your Password');
            });

            return response([
                'status' => true,
                'message' => 'Check your email'
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
    public function reset(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => 'required',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
        ]);

        if($validator->fails()){
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' =>$message->first()
            ]);
        }
        /** @var User $user */
        $token = $request->input('token');
        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'status' => false,
                'message' => 'Invalid token!'
            ], 400);
        }

        if(!$user = User::where('email', $passwordResets->email)->first()){
            return response([
                'status' => false,
                'message' => 'User doesn\'t exist!'
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response([
            'status' => true,
            'message' => 'Success'
        ]);
    }
    public function checkToken(Request $request){
        $token = $request->input('token');
        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'status' => false,
                'message' => 'Invalid token!'
            ], 400);
        }

        return response([
            'status' => true,
            'message' => 'Success'
        ]);
    }
    public function takeAddress(Request $request){
     
        $rules = [
            'email'=>'required|email',
            'user_address' => 'required',
            'user_tel' => 'required',
          ];

          $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
            $data = $validator->errors()->first();
            return collect([
              'status' => false,
              'message' => $data
            ]);
          }
        
               try {
            $user = User::where('email',$request->email)
            ->update([
                'user_address' => $request->input('user_address'),
                'user_tel' => $request->input('user_tel'),
            ]);


            return response([
                'status' => true,
                'message' => 'Success',
                'user' => $user
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }
    public function addToCart(Request $request){
     
        $rules = [
            'date_modified' => 'required',
            'email'=> 'email|required'
          ];

          $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
            $data = $validator->errors()->first();
            return collect([
              'status' => false,
              'message' => $data
            ]);
          }

          $userId=User::where('email',$request->email)->pluck('id');
          dd($userId);

        try {
            $user = Cart::create([
                'date_modified' => $request->input('date_modified'),
                'user_id' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            $token = $user->createToken('app')->accessToken;

            return response([
                'status' => true,
                'message' => 'Success',
                'token' => $token,
                'user' => $user
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage()
            ], 400);
        }
    }

}

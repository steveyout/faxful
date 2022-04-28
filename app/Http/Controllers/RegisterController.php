<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;
use App\Models\User;

class RegisterController extends Controller
{
    //register user
    public function Register(Request $request){
        $data=$request->only(['username','country','email','phone','password']);
        $email=$data['email'];
        $username=$data['username'];
        $password=$data['password'];
        $country=$data['country'];
        $phone=$data['phone'];
        try {
            $is_exists=User::Where('email',$email)->get();
            $is_exists= !(count($is_exists) == 0);
            if ($is_exists){
                return response()->json([
                    'success'=>false,
                    'msg'=>'User exists,PLease login'
                ],403);
            }else {
                $user=User::create([
                    'email'=>$email,
                    'name'=>$username,
                    'phone'=>$phone,
                    'password'=>Hash::make($password),
                    'country'=>$country
                ]);
                Auth::login($user);
                return response()->json([
                    'success' => true,
                    'msg' => 'Registration success'
                ]);
            }
        }catch (Throwable $e){
            report($e);
            return response()->json([
               'success' =>false,
                'msg'=>$e
            ],403);
        }

    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),
        ['name'=>'required|string|max:50',
        'email'=>'required|string|max:50|email|unique:users',
        'password'=>'required|string|min:3']);

        if($validator->fails())
            return response()->json($validator->errors());
        $user=User::create(
            ['name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['data'=>$user,'access_token'=>$token,'token_type'=>'Bearer']);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password')))
            return response()->json(['message'=>'Unauthorised'],401);
        $user=User::where('email',$request['email'])->firstOrFail();

        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['message'=>'Pozdrav,',$user->name,' dobro dosao','access_token'=>$token,'token_type'=>'Bearer']);
    
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * @param Request $request
     * @response array{"firstname":"","lastname":"","phone":"","password":""}
     */
    public function register(Request $request)
    {
        
        $user = new User([
            'firstname'  => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password'=>Hash::make($request->password),
        ]);

        if($user->save()){
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }   
    }

    /**
     * @param Request $request
     * @response array{"firstname":"","password":""}
     */

    public function login(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('firstname', $data['firstname'])->first();

         if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }

     
}

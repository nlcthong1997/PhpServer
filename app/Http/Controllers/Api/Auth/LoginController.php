<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Api\Controller;
use App\Http\Rules\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class LoginController extends Controller
{
    // Auth::guard() <=> auth()

    public function __construct()
    {
        $this->middleware('jwtauth')->except(['login', 'register']);
    }


    public function login(Request $request)
    {
        $content = json_decode($request->getContent());
        $credentials = [
            'email' => $content->email,
            'password' => $content->password
        ];

        if ($token = auth()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['success' => true, 'message' => 'Successfully logged out'], 200);
    }


    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), Register::rules(), Register::messages());

            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => $validator->errors()], 400);
            }

            $username =  explode('@', $request->input('email'))[0];
            $newUser = User::create([
                'username' => $username,
                'nick_name' => $request->input('nick_name') ?? $username,
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return response()->json(['success' => true, 'message' => 'Registered successfully', 'user' => $newUser], 200);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Server Error!'], 500);
        }
    }


    public function user()
    {
        return response()->json(['success' => true, 'user' => auth()->user()]);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'user' => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $auth;
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth = Auth::guard()->user();
    }

    public function test()
    {
        return response()->json(['success' => 'This fuction test api', 'data' => $this->auth], 200);
    }
}

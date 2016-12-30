<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function register(Request $request) {
        return response()->json(registerUser($request->all()));
    }
}
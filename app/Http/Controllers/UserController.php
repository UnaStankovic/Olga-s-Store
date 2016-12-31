<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function register(Request $request) {
        return response()->json(registerUser($request->all()));
    }

    public function confirm($id, $code) {
        DB::table('User')->where('id', intval($id))->where('confirmation_code', $code)->update(['status' => 'active']);
        return redirect('main.html');
    }

    public function login(Request $request) {
        return response()->json(loginUser($request->all()));
    }

    public function logout() {
        return response()->json(logoutUser());
    }
}
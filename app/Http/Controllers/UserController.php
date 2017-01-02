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
        return redirect('views/main.html');
    }

    public function login(Request $request) {
        return response()->json(loginUser($request->all()));
    }

    public function logout() {
        return response()->json(logoutUser());
    }

    public function getUser($id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'C')) {
            $res->status = 'error';
            $res->error_type = 'permission';
            $res->message = 'Not authorized';
            return response()->json($res);
        }

        $user = DB::table('User')->where('id', intval($id))->get();
        if(count($user) == 0) {
            $res->status = 'error';
            $res->error_type = 'id';
            $res->message = 'There is no such user';
            return response()->json($res);
        }
        unset($user[0]->password);
        unset($user[0]->confirmation_code);
        $res->status = 'success';
        $res->user = $user[0];

        return response()->json($res);
    }
}
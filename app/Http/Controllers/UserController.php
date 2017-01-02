<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
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

    public function changeUser(Request $request, $id) {
        $res = new \stdClass();

        if(!isAuthenticated()) {
            $res->status = 'error';
            $res->error_type = 'permission';
            $res->message = 'Not authorized';
            return response()->json($res);
        } else if(isAuthorized($_SESSION['userId'], 'A')) {
            //authorized
        } else if(isAuthorized($_SESSION['userId'], 'C')) {
            if($_SESSION['userId'] != intval($id)) {
                $res->status = 'error';
                $res->error_type = 'permission';
                $res->message = 'Not authorized';
                return response()->json($res);
            }
        } else {
            $res->status = 'error';
            $res->error_type = 'permission';
            $res->message = 'Not authorized';
            return response()->json($res);
        }

        $data = $request->all();
        if(isset($data['email']) || isset($data['id']) || isset($data['confirmation_code']) || isset($data['status'])) {
            $res->status = 'error';
            $res->error_type = 'illegal_update';
            $res->message = 'There is one or more columns that can\'t be changed';
            return response()->json($res);
        }

        if(isset($data['password'])) {
            if(strlen($data['password']) < 8) {
                $res->status = 'error';
                $res->message = 'Password must have at least 8 characters';
                $res->error_type = 'password';
                return response()->json($res);
            }
            $data['password'] = sha1($data['password']);
        }

        $user = DB::table('User')->where('id', intval($id));
        if(count($user->get()) == 0) {
            $res->status = 'error';
            $res->error_type = 'id';
            $res->message = 'There is no such user';
            return response()->json($res);
        }
        $user->update($data);

        $res->status = 'success';
        $user = $user->get();
        unset($user[0]->password);
        unset($user[0]->confirmation_code);
        $res->user = $user[0];
        return response()->json($res);
    }
}
<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function register(Request $request) {
        return response()->json(registerUser($request->all()));
    }

    public function confirm($id, $code) {
        DB::table('User')->where('id', intval($id))->where('confirmation_code', $code)->update(['status' => 'active']);
        return redirect('views/main.php');
    }

    public function login(Request $request) {
        return response()->json(loginUser($request->all()));
    }

    public function logout() {
        return response()->json(logoutUser());
    }

    public function getUser($id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $user = DB::table('User')->where('id', intval($id))->get();
        if(count($user) == 0)
            return response()->json(errorResponse($res, 'There is no such user', 'id'));

        unset($user[0]->password);
        unset($user[0]->confirmation_code);
        $res->status = 'success';
        $res->user = $user[0];

        return response()->json($res);
    }

    public function changeUser(Request $request, $id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();
        if(isset($data['email']) || isset($data['id']) || isset($data['confirmation_code']) || isset($data['status'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }

        if(isset($data['password'])) {
            if(strlen($data['password']) < 8) {
                return response()->json(errorResponse($res, 'Password must have at least 8 characters', 'password'));
            }
            $data['password'] = sha1($data['password']);
        }

        $user = DB::table('User')->where('id', intval($id));
        if(count($user->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such user', 'id'));
        }
        $user->update($data);

        $res->status = 'success';
        $user = $user->get();
        unset($user[0]->password);
        unset($user[0]->confirmation_code);
        $res->user = $user[0];
        return response()->json($res);
    }

    function deleteUser($id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $user = DB::table('User')->where('id', intval($id));
        if(count($user->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such user', 'id'));
        }
        $user->delete();

        $res->status = 'success';
        return response()->json($res);
    }

    function index() {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $users = DB::table('User')
            ->select('id', 'email', 'name', 'surname', 'address', 'city', 'country', 'telephone', 'status')->get();
        $res->status = 'success';
        $res->users = $users;
        return response()->json($res);
    }
}
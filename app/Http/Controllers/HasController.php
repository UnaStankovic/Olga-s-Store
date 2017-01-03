<?php
/**
 * Created by PhpStorm.
 * User: miki208
 * Date: 03/01/2017
 * Time: 13:27
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HasController extends Controller {
    public function index() {
        $res = new \stdClass();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $res->status = 'success';
        $privileges = DB::table('Has')
            ->select('User_id AS id', DB::raw('GROUP_CONCAT(Privilege_id) AS privileges'))
            ->groupBy('User_id')
            ->get();
        $res->users = $privileges;
        return response()->json($res);
    }

    public function getPrivilegesForUser($id) {
        $res = new \stdClass();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(count(DB::table('User')->where('id', $id)->get()) == 0)
            return response()->json(errorResponse($res, 'There is no such user', 'id'));

        $user = DB::table('Has')
            ->select('User_id AS id', DB::raw('GROUP_CONCAT(Privilege_id) AS privileges'))
            ->where('User_id', $id)
            ->groupBy('User_id')
            ->get();

        if(count($user) == 0) {
            $res->status = 'status';
            $res->user = new \stdClass();
            $res->user->id = $id;
            $res->user->privileges = NULL;
            return response()->json($res);
        }

        $res->status = 'success';
        $res->user = $user[0];
        return response()->json($res);
    }

    public function createPrivilege(Request $request) {
        $res = new \stdClass();
        $data = $request->all();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(!isset($data['id']) || !isset($data['privilege']))
            return response()->json(errorResponse($res, 'id and privilege are required', 'id,privilege'));

        if(count(DB::table('Has')->where('User_id', $data['id'])->get()) == 0)
            return response()->json(errorResponse($res, 'There is no such user', 'id'));

        if(count(DB::table('Has')->where('Privilege_id', $data['privilege'])->get()) == 0)
            return response()->json(errorResponse($res, 'There is no such privilege', 'privilege'));

        if(count(DB::table('Has')->where('User_id', $data['id'])->where('Privilege_id', $data['privilege'])->get()) != 0)
            return response()->json(errorResponse($res, 'User already have privilege', 'privilege_exists'));

        DB::table('Has')->insert(['User_id' => $data['id'], 'Privilege_id' => $data['privilege']]);

        $res->status = 'success';
        return response()->json($res);
    }

    public function deletePrivilege($id, $privilege) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(count(DB::table('Has')->where('User_id', $id)->get()) == 0)
            return response()->json(errorResponse($res, 'There is no such user', 'id'));

        if(count(DB::table('Has')->where('Privilege_id', $privilege)->get()) == 0)
            return response()->json(errorResponse($res, 'There is no such privilege', 'privilege'));

        if(count(DB::table('Has')->where('User_id', $id)->where('Privilege_id', $privilege)->get()) == 0)
            return response()->json(errorResponse($res, 'User doesn\'t have the privilege', 'privilege_not_exists'));

        DB::table('Has')->where('User_id', $id)->where('Privilege_id', $privilege)->delete();
        $res->status = 'success';
        return response()->json($res);
    }
}
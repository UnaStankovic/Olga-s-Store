<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrivilegeController extends Controller {
    function index() {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $privileges = DB::table('Privilege')->select('id', 'description')->get();
        $res->status = 'success';
        $res->privileges = $privileges;
        return response()->json($res);
    }

    public function getPrivilege($id) {

        $res = new \stdClass();

        $privilege = DB::table('Privilege')->where('id', intval($id))->get();
        if(count($privilege) == 0)
            return response()->json(errorResponse($res, 'There is no such privilege', 'id'));

        $res->status = 'success';
        $res->privilege = $privilege[0];

        return response()->json($res);
    }

    public function updatePrivilege(Request $request, $id) {
        
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A', $id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();

        $privilege = DB::table('Privilege')->where('id', intval($id));
        if(count($privilege->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such privilege', 'id'));
        }
        $privilege->update($data);

        $res->status = 'success';
        $privilege = $privilege->get();
        $res->privilege = $privilege[0];
        return response()->json($res);
    }

    function deletePrivilege($id) {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $privilege = DB::table('Privilege')->where('id', $id);
        if(count($privilege->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such privilege', 'id'));
        }
        $privilege->delete();

        $res->status = 'success';
        return response()->json($res);
    }

    public function createPrivilege(Request $request) {

        $res = new \stdClass();
        $data = $request->all();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(!isset($data['id']) || !isset($data['description']))
            return response()->json(errorResponse($res, 'id and description are required', 'id, description'));
        DB::table('Privilege')->insert(['id' => $data['id'], 'description' => $data['description']]);

        $res->status = 'success';
        return response()->json($res);
    }
}
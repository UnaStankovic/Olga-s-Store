<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller {
   public function index(Request $request) {
        $available_fields = array('id', 'email', 'name', 'surname', 'telephone');
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();
        foreach($data as $key => $value) {
            if(array_search($key, $available_fields) === FALSE) {
                unset($data[$key]);
            }
        }
        
        $users = DB::table('User');
        if(isset($data['id'])) {
            $users = $users->where('id', $data['id']);
        }
        if(isset($data['email'])) {
            $users = $users->where('email', $data['email']);
        }
        if(isset($data['name'])) {
            $users = $users->where('name', $data['name']);
        }
        if(isset($data['surname'])) {
            $users = $users->where('surname', $data['surname']);
        }
        if(isset($data['telephone'])) {
            $users = $users->where('telephone', $data['telephone']);
        }
        $users = $users->select('User.id', 'User.email', 'User.name', 'User.surname', 'User.address', 'User.city', 'User.country', 'User.telephone', 'User.status')->get();
        $res->status = 'success';
        $res->users = $users;
        return response()->json($res);
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller {
    public function searchUser(Request $request) {
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
        
        $user = DB::table('User');
        if(isset($data['id'])) {
            $user = $user->where('id', $data['id']);
        }
        if(isset($data['email'])) {
            $user = $user->where('email', $data['email']);
        }
        if(isset($data['name'])) {
            $user = $user->where('name', $data['name']);
        }
        if(isset($data['surname'])) {
            $user = $user->where('surname', $data['surname']);
        }
        if(isset($data['telephone'])) {
            $user = $user->where('telephone', $data['telephone']);
        }
        $user = $user->select('User.id', 'User.email', 'User.name', 'User.surname', 'User.address', 'User.city', 'User.country', 'User.telephone', 'User.status')->get();
        $res->status = 'success';
        $res->user = $user[0];
        return response()->json($res);
    }

    public function searchProduct(Request $request) {
        $available_fields = array('id', 'name');
        $res = new \stdClass();

        /*if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }*/

        $data = $request->all();
        foreach($data as $key => $value) {
            if(array_search($key, $available_fields) === FALSE) {
                unset($data[$key]);
            }
        }
        
        $product = DB::table('Product');
        if(isset($data['id'])) {
            $product = $product->where('id', $data['id']);
        }
        if(isset($data['name'])) {
            $product = $product->where('name', $data['name']);
        }
        
        $product = $product->get();
        $res->status = 'success';
        $res->product = $product[0];
        return response()->json($res);
    }
}

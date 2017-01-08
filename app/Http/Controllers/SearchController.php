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
        $available_fields = array('id', 'name', 'in_stock', 'category');
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
        
        $products = DB::table('Product');
        if(isset($data['id'])) {
            $products = $products->where('id', $data['id']);
        }
        if(isset($data['name'])) {
            $products = $products->where('name', $data['name']);
        }
        if(isset($data['category'])) {
            $products = $products->where('Category_id', $data['category']);
        }
        if(isset($data['in_stock']) && $data['in_stock'] == TRUE) {
            $products = $products->where('in_stock', '>', 0);
        }
        else if(isset($data['in_stock']) && $data['in_stock'] == FALSE) {
            $products = $products->where('in_stock', '=', 0);
        }
        
        $products = $products->get();
        $res->status = 'success';
        $res->products = $products;
        return response()->json($res);
    }
}

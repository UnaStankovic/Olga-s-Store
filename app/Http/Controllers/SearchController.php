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
        $available_fields = array('id', 'name', 'in_stock', 'category', 'price');
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
            $products = $products->where('Product.id', $data['id']);
        }
        if(isset($data['name'])) {
            $products = $products->where('name', $data['name']);
        }
        if(isset($data['category'])) {
            $products = $products->where('Category_id', $data['category']);
        }
        if(isset($data['price'])) {
            $products = $products->where('price_per_piece', $data['price']);
        }
        if(isset($data['in_stock']) && $data['in_stock'] == TRUE) {
            $products = $products->where('in_stock', '>', 0);
        }
        else if(isset($data['in_stock']) && $data['in_stock'] == FALSE) {
            $products = $products->where('in_stock', '=', 0);
        }

        $products = $products->join('ProductImage', 'Product.id', '=', 'ProductImage.Product_id')
                    ->select('Product.*', 'ProductImage.path')->get();

        $res->status = 'success';
        $res->products = $products;
        return response()->json($res);
    }

    public function searchCategory(Request $request) {
        $pageSize = 10;
        $res = new \stdClass();

        $data = $request->all();

        $query = DB::table('Category')->join('Product', 'Category.id', '=', 'Product.Category_id')
                   ->where('Category.id', '=', $data['id'])->select('Product.id', 'Product.name', 'Product.description', 'Product.price_per_piece', 'Product.in_stock');

        $res->count = count($query->get());
        $res->pageSize = $pageSize;

        if($request->has('page'))
          $query = $query->skip(($request->input('page') - 1) * $pageSize)->take($pageSize);

        $product = $query->get();
        $res->products = $product;
        foreach($product as $key => $value) {
             $images = DB::table('Category')->join('Product', 'Category.id', '=', 'Product.Category_id')->join('ProductImage', 'ProductImage.Product_id', '=', 'Product.id')
                       ->where('Category.id', '=', $data['id'])->where('Product.id', '=', $product[$key]->id)->select('ProductImage.path')->get();
             $res->products[$key]->images = $images;
        }

        $res->status = 'success';
        return response()->json($res);
    }
}

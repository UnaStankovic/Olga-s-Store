<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller {   
    function index() {
        
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $products = DB::table('Product')->select('id', 'description', 'price_per_piece', 'in_stock', 'name', 'Category_id')->get();
        $res->status = 'success';
        $res->products = $products;
        return response()->json($res);
    }
    
      public function getProduct($id) {
        
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $product = DB::table('Product')->where('id', intval($id))->get();
        if(count($product) == 0)
            return response()->json(errorResponse($res, 'There is no such product', 'id'));

        $res->status = 'success';
        $res->product = $product[0];

        return response()->json($res);
    }
    
     public function updateProduct(Request $request, $id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();
        if(isset($data['id']) || isset($data['Category_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }

        $product = DB::table('Product')->where('id', intval($id));
        if(count($product->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such product', 'id'));
        }
        $product->update($data);

        $res->status = 'success';
        $product = $product->get();
        $res->product = $product[0];
        return response()->json($res);
    }
    
    function deleteProduct($id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $product = DB::table('Product')->where('id', intval($id));
        if(count($product->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such product', 'id'));
        }
        $product->delete();

        $res->status = 'success';
        return response()->json($res);
    }
}
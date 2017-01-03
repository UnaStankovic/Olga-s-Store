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
}
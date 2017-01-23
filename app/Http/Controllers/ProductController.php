<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request) {
        $pageSize = 10;
        $response = new \stdClass();

        $query = DB::table('Product');

        $response->count = count($query->get());
        $response->pageSize = $pageSize;

        if($request->has('page'))
            $query = $query->skip(($request->input('page') - 1) * $pageSize)->take($pageSize);

        $products = $query->get();

        $response->status = 'success';
        $response->products = $products;
        foreach($response->products as $key => $value)
            $response->products[$key]->images = 'api/products/' . $response->products[$key]->id . '/images';
        return response()->json($response);
    }

    public function get($id) {
        $response = new \stdClass();

        $product = DB::table('Product')->where('id', intval($id))->get();
        if(count($product) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

        $response->status = 'success';
        $response->product = $product[0];
        $response->product->images = 'api/products/' . $response->product->id . '/images';
        return response()->json($response);
    }

     public function update(Request $request, $id) {
         $available_fields = array('description', 'price_per_piece', 'in_stock', 'name', 'Category_id');
         $response = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($response, 'Not authorized to change product', 'not_authorized'));

        $data = $request->all();
         foreach($data as $key => $value)
             if(array_search($key, $available_fields) === FALSE)
                 unset($data[$key]);

        $product = DB::table('Product')->where('id', $id);
        if(count($product->get()) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

         if(isset($data['Category_id']) && count(DB::table('Category')->where('id', $data['Category_id'])->get()) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

         $product->update($data);
         $response->status = 'success';
         $product = $product->get();
         $response->product = $product[0];
         $response->product->images = 'api/products/' . $response->product->id . '/images';
         return response()->json($response);
    }

    public function delete($id) {
        $response = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($response, 'Not authorized to change product', 'not_authorized'));

        $product = DB::table('Product')->where('id', $id);
        if(count($product->get()) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

        $product->delete();
        $response->status = 'success';
        return response()->json($response);
    }

    public function create(Request $request) {
        $available_fields = array('description', 'price_per_piece', 'in_stock', 'name', 'Category_id');
        $mandatory_fields = array('name', 'description', 'price_per_piece', 'Category_id', 'in_stock');
        $response = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($response, 'Not authorized to add product', 'not_authorized'));

        $data = $request->all();
        foreach($data as $key => $value)
            if (array_search($key, $available_fields) === FALSE)
                unset($data[$key]);

        if(mandatoryFields($data, $mandatory_fields) === FALSE)
            return response()->json(errorResponse($response, 'name, description, price_per_piece, Category_id, in_stock are required', 'bad_request'));

        $id = DB::table('Product')->insertGetId($data);
        $response->status = 'success';
        $response->product = DB::table('Product')->where('id', $id)->get()[0];
        $response->product->images = 'api/products/' . $response->product->id . '/images';
        return response()->json($response);
    }
}

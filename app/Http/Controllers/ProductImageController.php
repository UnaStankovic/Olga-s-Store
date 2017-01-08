<?php
/**
 * Created by PhpStorm.
 * User: miki208
 * Date: 08/01/2017
 * Time: 15:31
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller {
    private $supported_extensions = array('jpg', 'jpeg', 'png');

    public function create(Request $request, $pid) {
        $response = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($response, 'Not authorized to add an image', 'not_authorized'));

        if(count(DB::table('Product')->where('id', $pid)->get()) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

        if(!$request->hasFile('image') || !$request->file('image')->isValid())
            return response()->json(errorResponse($response, 'Image is not uploaded', 'not_found'));

        $image = $request->file('image');
        if(array_search($image->getClientOriginalExtension(), $this->supported_extensions) === FALSE)
            return response()->json(errorResponse($response, 'Image extension not supported', 'not_implemented'));

        $id = DB::table('ProductImage')->insertGetId(['path' => 'path', 'Product_id' => $pid]);
        DB::table('ProductImage')->where('id', $id)->update(['path' => '/img/' . $id . '.' . $image->getClientOriginalExtension()]);
        $image->move('app/assets/img' , $id . '.' . $image->getClientOriginalExtension());

        $response->status = 'success';
        $response->image = DB::table('ProductImage')->where('id', $id)->get()[0];
        return response()->json($response);
    }

    public function delete($pid, $id) {
        $response = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($response, 'Not authorized to delete an image', 'not_authorized'));

        $query = DB::table('ProductImage')->where('Product_id', $pid)->where('id', $id);
        if(count($query->get()) == 0)
            return response()->json(errorResponse($response, 'Product/image doesn\'t exist', 'not_found'));

        unlink('app/assets' . $query->get()[0]->path);
        $query->delete();

        $response->status = 'success';

        return response()->json($response);
    }

    public function index($pid) {
        $response = new \stdClass();

        if(count(DB::table('Product')->where('id', $pid)->get()) == 0)
            return response()->json(errorResponse($response, 'Product doesn\'t exist', 'not_found'));

        $response->status = 'success';
        $response->images = DB::table('ProductImage')->where('Product_id', $pid)->get();

        return response()->json($response);
    }

    public function get($pid, $id) {
        $response = new \stdClass();

        $result = DB::table('ProductImage')->where('Product_id', $pid)->where('id', $id)->get();
        if(count($result) == 0)
            return response()->json(errorResponse($response, 'Product/image doesn\'t exist', 'not_found'));

        $response->status = 'success';
        $response->image = $result[0];
        return response()->json($response);
    }
}
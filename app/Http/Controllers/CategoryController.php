<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {

        $res = new \stdClass();

        $categories = DB::table('Category')->select('id', 'name')->get();
        $res->status = 'success';
        $res->categories = $categories;
        return response()->json($res);
    }

    public function getCategory($id) {

        $res = new \stdClass();

        $category = DB::table('Category')->where('id', intval($id))->get();
        if(count($category) == 0)
            return response()->json(errorResponse($res, 'There is no such category', 'id'));

        $res->status = 'success';
        $res->category = $category[0];

        return response()->json($res);
    }

    public function updateCategory(Request $request, $id) {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();
        if(isset($data['id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }

        $category = DB::table('Category')->where('id', intval($id));
        if(count($category->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such category', 'id'));
        }
        $category->update($data);

        $res->status = 'success';
        $category = $category->get();
        $res->category = $category[0];
        return response()->json($res);
    }

    public function deleteCategory($id) {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $category = DB::table('Category')->where('id', intval($id));
        if(count($category->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such category', 'id'));
        }
        $category->delete();

        $res->status = 'success';
        return response()->json($res);
    }

    public function createCategory(Request $request) {

        $res = new \stdClass();
        $data = $request->all();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(!isset($data['name']))
            return response()->json(errorResponse($res, 'name is required', 'name'));
        $id = DB::table('Category')->insertGetId(['name' => $data['name']]);

        $res->category = DB::table('Category')->find($id);
        $res->status = 'success';
        return response()->json($res);
    }
}

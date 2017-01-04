<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller {
    function index() {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $orders = DB::table('Order')->select('id', 'date_of_creation', 'status', 'amount', 'User_id', 'comment')->get();
        $res->status = 'success';
        $res->orders = $orders;
        return response()->json($res);
    }

    public function getOrder($id) {

        $res = new \stdClass();

        $order = DB::table('Order')->where('id', intval($id))->get();
        if(count($order) == 0)
            return response()->json(errorResponse($res, 'There is no such order', 'id'));

        $res->status = 'success';
        $res->order = $order[0];

        return response()->json($res);
    }

    public function updateOrder(Request $request, $id) {
        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }

        $data = $request->all();
        //we can't change the date_of_creation and User_id, is this ok?
        if(isset($data['id']) || isset($data['date_of_creation']) || isset($data['User_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }

        $order = DB::table('Order')->where('id', intval($id));
        if(count($order->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such order', 'id'));
        }
        $order->update($data);

        $res->status = 'success';
        $order = $order->get();
        $res->order = $order[0];
        return response()->json($res);
    }

    function deleteOrder($id) {

        $res = new \stdClass();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $order = DB::table('Order')->where('id', intval($id));
        if(count($order->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such order', 'id'));
        }
        $order->delete();

        $res->status = 'success';
        return response()->json($res);
    }

    public function createOrder(Request $request) {

        $res = new \stdClass();
        $data = $request->all();

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A'))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        if(!isset($data['date_of_creation']) || !isset($data['status']) || !isset($data['amount']) || !isset($data['User_id']))
            return response()->json(errorResponse($res, 'date_of_creation, status, amount and User_id are required', 'date_of_creation, status, amount, User_id'));
        DB::table('Order')->insert(['date_of_creation' => $data['date_of_creation'], 'status' => $data['status'], 'amount' => $data['amount'], 'User_id' => $data['User_id']]);

        $res->status = 'success';
        return response()->json($res);
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index() {

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
 
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $order[0]->User_id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }
        
        if(count($order) == 0) {
            return response()->json(errorResponse($res, 'There is no such order', 'id'));
        }
        
        $products = DB::table('Contains')->join('Product', 'Product_id', '=', 'id')
                    ->select('Contains.Product_id AS id', 'Product.name', 'Product.price_per_piece AS price', 'Contains.quantity')->where('Order_id', intval($id))->get();
        $res->status = 'success';
        $res->order = $order[0];
        $res->order->products = $products;

        return response()->json($res);
    }

    public function updateOrder(Request $request, $id) {
        
        $res = new \stdClass();

        $data = $request->all();
       
        if(isset($data['id']) || isset($data['date_of_creation']) || isset($data['User_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }

        $order = DB::table('Order')->where('id', intval($id)); 
        $tmp = DB::table('Order')->where('id', intval($id))->get();
        
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $tmp[0]->User_id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }
        if(count($order->get()) == 0) {
            return response()->json(errorResponse($res, 'There is no such order', 'id'));
        }
        $order->update($data);

        $res->status = 'success';
        $order = $order->get();
        $res->order = $order[0];
        return response()->json($res);
    }
    
    public function deleteOrder($id) {

        $res = new \stdClass();
            
        $order = DB::table('Order')->where('id', intval($id));  
        $tmp = DB::table('Order')->where('id', intval($id))->get();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $tmp[0]->User_id))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
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

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $_SESSION['userId']))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        
        $product_price = DB::table('Product')->where('id', $data['Product_id'])->select('Product.price_per_piece')->get();
        $order_amount = $data['quantity'] * $product_price[0]->price_per_piece;
        
        if(!isset($data['date_of_creation']) || !isset($data['status']) || !isset($_SESSION['userId'])) {
            return response()->json(errorResponse($res, 'date_of_creation, status, amount and User_id are required', 'date_of_creation, status, amount, User_id'));
        }
        DB::table('Order')->insert(['date_of_creation' => $data['date_of_creation'], 'status' => $data['status'], 'amount' => $order_amount, 'User_id' => $_SESSION['userId']]);
        
        $order_id = DB::table('Order')->max('id');
        if(!isset($data['Product_id']) || !isset($data['quantity'])) {
            return response()->json(errorResponse($res, 'Product_id and quantity are required', 'Product_id, quantity'));
        }
        
        DB::table('Contains')->insert(['quantity' => $data['quantity'], 'Product_id' => $data['Product_id'], 'Order_id' => $order_id]);
        
        $res->status = 'success';
        return response()->json($res);
    }

}

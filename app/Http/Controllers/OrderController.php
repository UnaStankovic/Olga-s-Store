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
                    ->select('Contains.Product_id', 'Product.name', 'Product.price_per_piece', 'Contains.quantity')->where('Order_id', intval($id))->get();
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

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A')) {
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
        $available_fields = array('User_id', 'contains');
        $mandatory_fields = array('User_id');
        $res = new \stdClass();
        $data = $request->all();

        foreach($data as $key => $value)
            if (array_search($key, $available_fields) === FALSE)
                unset($data[$key]);

        if(mandatoryFields($data, $mandatory_fields) === FALSE)
            return response()->json(errorResponse($res, 'User_id is required', 'bad_request'));

        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|C^', $data['User_id']))
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));

        $contains = isset($data['contains']) && is_array($data['contains']) ? $data['contains'] : null;
        unset($data['contains']);
        if(count(DB::table('User')->where('id', $data['User_id'])->get()) == 0)
            return response()->json(errorResponse($res, 'User doesn\'t exist', 'not_found'));

        $amount = 0;
        if($contains !== null) {
            $available_fields = array('Product_id', 'quantity');
            $mandatory_fields = array('Product_id', 'quantity');

            foreach($contains as $pid => $product) {
                foreach($product as $key => $value)
                    if (array_search($key, $available_fields) === FALSE)
                        unset($contains[$pid][$key]);

                if(mandatoryFields($product, $mandatory_fields) === FALSE)
                    return response()->json(errorResponse($res, 'Product_id and quantity are required', 'bad_request'));

                $productInfo = DB::table('Product')->where('id', $product['Product_id'])->where('in_stock', 1)->get();
                if(count($productInfo) == 1)
                    $amount += $productInfo[0]->price_per_piece * $product['quantity'];
                else
                    unset($contains[$pid]);
            }
        }
        $order_id = DB::table('Order')->insertGetId(['date_of_creation' => date('Y-m-d'), 'status' => 'na cekanju', 'amount' => $amount, 'User_id' => $data['User_id']]);
        $res->order = DB::table('Order')->find($order_id);

        if($contains !== null) {
            foreach($contains as $key => $value)
                $contains[$key]['Order_id'] = $order_id;

            Db::table('Contains')->insert($contains);
            $res->order->contains = $contains;
        }

        $res->status = 'success';
        return response()->json($res);
    }

}

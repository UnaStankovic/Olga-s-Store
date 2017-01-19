<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContainsController extends Controller {

    //function that is used to add a product in to the order and to update the amount of the order
    //$id represents the Order_id
    
    public function insertProduct(Request $request, $id) {
        
        $res = new \stdClass();
        $data = $request->all();
       
        if(isset($data['Order_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }
        
        //we have to see if the current user is authorized so we have to find his User_id
        $tmp = DB::table('Order')->where('id', intval($id))->get();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $tmp[0]->User_id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }
        
        if(!isset($data['Product_id']) || !isset($data['quantity'])) {
            return response()->json(errorResponse($res, 'Product_id and quantity are required', 'Product_id, quantity'));
        }
        
        //first we will insert the product in table Contains
        DB::table('Contains')->insert(['Order_id' => intval($id), 'Product_id' => $data['Product_id'], 'quantity' => $data['quantity']]);
        
        //we must know the current amount of the order and the price of the product that is being inserted and then we can update the amount of the order
        $current_amount = DB::table('Order')->where('id', intval($id))->get();
        $price = DB::table('Product')->where('id', $data['Product_id'])->get();
        DB::table('Order')->where('id', intval($id))->update(['amount' => ($current_amount[0]->amount + $data['quantity'] * $price[0]->price_per_piece)]);
        
        $res->status = 'success';
        return response()->json($res);
    }
    
    //function that is used to change the quantity of some product which is currently in the order
    //and to update the amount of the order
    //$id represents the Order_id
    
    public function changeQuantity(Request $request, $id) {
        
        $res = new \stdClass();
        $data = $request->all();
       
        if(isset($data['Order_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }
        
        //we have to see if the current user is authorized so we have to find his User_id
        $tmp = DB::table('Order')->where('id', intval($id))->get();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $tmp[0]->User_id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }
        
        if(!isset($data['Product_id']) || !isset($data['quantity'])) {
            return response()->json(errorResponse($res, 'Product_id and quantity are required', 'Product_id, quantity'));
        }
        
        //we must know the current amount of the order that doesn't include this product
        //first we must know the price of the product
        
        $price = DB::table('Product')->where('id', $data['Product_id'])->get();
        $tmp = DB::table('Contains')->where('Order_id', intval($id))->where('Product_id', $data['Product_id'])->get();
        
        $current_amount = DB::table('Order')->where('id', intval($id))->get();
        $new_amount = $current_amount[0]->amount - $tmp[0]->quantity * $price[0]->price_per_piece;
        
        //now we can update the amount of the order and to update table Contains
        
        DB::table('Order')->where('id', intval($id))->update(['amount' => ($new_amount + $data['quantity'] * $price[0]->price_per_piece)]);
        DB::table('Contains')->where('Order_id', intval($id))->where('Product_id', $data['Product_id'])->update(['quantity' => $data['quantity']]);
            
        $res->status = 'success';
        return response()->json($res);    
    }
    
    //function that deletes the product from table contains and updates the amount of the order
    //$id represents the Order_id
    
    public function deleteProduct(Request $request, $id) {
        $res = new \stdClass();
        $data = $request->all();
       
        if(isset($data['Order_id'])) {
            return response()->json(errorResponse($res, 'There is one or more columns that can\'t be changed', 'illegal_update'));
        }
        
        //we have to see if the current user is authorized so we have to find his User_id
        $tmp = DB::table('Order')->where('id', intval($id))->get();
        if(!isAuthenticated() || !isAuthorized($_SESSION['userId'], 'A|^', $tmp[0]->User_id)) {
            return response()->json(errorResponse($res, 'Not authorized', 'permission'));
        }
        
        if(!isset($data['Product_id'])) {
            return response()->json(errorResponse($res, 'Product_id is required', 'Product_id'));
        }
        
        //we have to find the price of the product,quantity and the current amount of the order and then we can update the amount of the order
        
        $price = DB::table('Product')->where('id', $data['Product_id'])->get(); 
        $current_amount = DB::table('Order')->where('id', intval($id))->get();
        $quantity = DB::table('Contains')->where('Order_id', intval($id))->where('Product_id', $data['Product_id'])->get();
        DB::table('Order')->where('id', intval($id))->update(['amount' => ($current_amount[0]->amount - $quantity[0]->quantity * $price[0]->price_per_piece)]);
        
        //now we delete the product from table Contains
        DB::table('Contains')->where('Order_id', intval($id))->where('Product_id', $data['Product_id'])->delete();    
    
        $res->status = 'success';
        return response()->json($res);
    }
}
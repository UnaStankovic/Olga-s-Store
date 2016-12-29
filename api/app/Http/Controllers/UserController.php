<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function register(Request $request) {
        global $error_text;

        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name', '');
        $surname = $request->input('surname', '');
        $address = $request->input('address', '');
        $city = $request->input('city', '');
        $country = $request->input('country', '');
        $telephone = $request->input('telephone', '');


        if(registerUser($email, $password, $name, $surname, $address, $city, $country, $telephone)) {
            //successfully registered user
            return response()->json('success');
        } else {
            return response()->json("$error_text");
        }
    }
}
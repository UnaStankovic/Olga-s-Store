<?php
use App\User;

    function registerUser(array $data) {
        $response = new stdClass();

        //email validation
        if(!isset($data['email']) || !validate($data['email'], '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/')) {
            $response->status = 'error';
            $response->message = 'E-mail is invalid.';
            $response->error_type = 'email';
            return $response;
        }

        if(count(DB::table('User')->where('email', $data['email'])->get()) != 0) {
            $response->status = 'error';
            $response->message = 'User already exists.';
            $response->error_type = 'email';
            return $response;
        }

        //validate and encrypt password
        if(strlen($data['password']) < 8) {
            $response->status = 'error';
            $response->message = 'Password must have at least 8 characters';
            $response->error_type = 'password';
            return $response;
        }
        $data['password'] = sha1($data['password']);
        $data['status'] = 'inactive';
        $data['confirmation_code'] = md5(time());

        DB::table('User')->insert($data);

        $response->status = 'success';
        return $response;
    }

    function validate($input, $pattern) {
        if(preg_match($pattern, $input))
            return TRUE;
        return FALSE;
    }
?>
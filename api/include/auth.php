<?php
use App\User;

    $error_text = '';

    //returns TRUE if registration is successful, otherwise returns FALSE ($error_text is set properly)
    function registerUser($email, $password, $name = '', $surname = '', $address = '', $city = '', $country = '', $telephone = '') {
        global $error_text;
        if(!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)) {
            $error_text = 'Email invalid';
            return FALSE;
        }

        $user = User::where('email', $email)->get();
        if(count($user) != 0) {
            $error_text = 'User already exists';
            return FALSE;
        }

        if(strlen($password) < 8) {
            $error_text = 'Password must have at least 8 characters';
            return FALSE;
        }

        $password = sha1($password);

        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->name = $name;
        $user->surname = $surname;
        $user->address = $address;
        $user->city = $city;
        $user->country = $country;
        $user->telephone = $telephone;
        $user->status = 'inactive';
        $user->confirmation_code = md5(time());
        $user->save();

        return TRUE;
    }

    function isValidName($name) {
        if($name != '' && !preg_match('/[A-Za-z ]+/', $name))
            return FALSE;
        return TRUE;
    }
?>
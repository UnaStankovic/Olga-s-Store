<?php
    function errorResponse($response, $message, $error_type) {
        $response->status = 'error';
        $response->error_type = $error_type;
        $response->message = $message;
        return $response;
    }

    function registerUser(array $data) {
        $response = new stdClass();

        //email validation
        if(!isset($data['email']) || !validate($data['email'], '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/')) {
            return errorResponse($response, 'E-mail is invalid', 'email');
        }

        if(count(DB::table('User')->where('email', $data['email'])->get()) != 0) {
            return errorResponse($response, 'User already exists', 'email');
        }

        //validate and encrypt password
        if(!isset($data['password']) || strlen($data['password']) < 8) {
            return errorResponse($response, 'Password must have at least 8 characters', 'password');
        }
        $data['password'] = sha1($data['password']);
        $data['status'] = 'inactive';
        $data['confirmation_code'] = md5(time());

        $id = DB::table('User')->insertGetId($data);

        $message = 'Hi ' . ((isset($data['name'])) ? $data['name'] : $data['email']) . ',<br>';
        $message .= 'Thanks so much for joining!<br>To finish registration, you just need to confirm that we got your mail right.<br>';
        $message .= "Please click <a href='http://localhost/Olga-s-Store/public/confirm/$id/$data[confirmation_code]'>here</a> to confirm your mail.<br><br>";
        $message .= 'Pozdrav ' . ((isset($data['name'])) ? $data['name'] : $data['email']) . ',<br>';
        $message .= 'Hvala Vam sto ste nam se pridruzili!<br>Da zavrsite registraciju, potrebno je samo da potvrdite da je ovo vas email.<br>';
        $message .= "Kliknite <a href='http://localhost/Olga-s-Store/public/confirm/$id/$data[confirmation_code]'>ovde</a> da potvrdite vas mail";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($data['email'], 'Confirm registration / Potvrda registracije', $message, $headers);

        $response->status = 'success';
        return $response;
    }

    function loginUser($data) {
        $response = new stdClass();

        //is already logged in?
        if(isAuthenticated()) {
            $response->status = 'success';
            $response->user = new stdClass();
            $response->user->id = $_SESSION['userId'];
        }

        if(!isset($data['email']) || !isset($data['password'])) {
            return errorResponse($response, 'Email and password are required', 'email,password');
        }

        $user = DB::table('User')
            ->select('id', 'email', 'name', 'surname', 'address', 'city', 'country', 'telephone', 'status')
            ->where('email', $data['email'])
            ->where('password', sha1($data['password']))
            ->get();

        if(count($user) == 0) {
            return errorResponse($response, 'Wrong email or password', 'email,password');
        }

        if($user[0]->status == 'inactive') {
            return errorResponse($response, 'Email must be confirmed', 'email');
        }

        unset($user[0]->status);

        $response->status = 'success';
        $response->user = $user[0];

        $_SESSION['userId'] = $user[0]->id;
        $_SESSION['username'] = isset($user[0]->name) ? $user[0]->name : $user[0]->email;
        return $response;
    }

    function logoutUser() {
        $response = new stdClass();
        if(isAuthenticated()) {
            $_SESSION = array();
            session_destroy();
            setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);
        }
        $response->status = 'success';
        return $response;
    }

    function isAuthenticated() {
        session_start();
        if(isset($_SESSION['userId']))
            return TRUE;
        return FALSE;
    }

    //use: isAuthorized(123, 'C|A|^', $id) -- customer, administrator or current user is equals to $id
    //use: isAuthorized(153, 'AC|^', $id) -- administrator and customer, or current user is equals to $id
    function isAuthorized($userid, $setOfPrivileges, $id = 0) {
        $setOfPrivileges = explode('|', $setOfPrivileges);
        foreach($setOfPrivileges as $privileges) {
            $ok = TRUE;
            $privileges = str_split($privileges);
            foreach($privileges as $privilege) {
                if($privilege == '^') {
                    if($id != $userid) {
                        $ok = FALSE;
                        break;
                    }
                } else {
                    $user = DB::table('Has')->where('User_id', $userid)->where('Privilege_id', $privilege)->get();
                    if(count($user) == 0) {
                        $ok = FALSE;
                        break;
                    }
                }
            }
            if($ok == TRUE)
                return TRUE;
        }
        return FALSE;
    }

    function validate($input, $pattern) {
        if(preg_match($pattern, $input))
            return TRUE;
        return FALSE;
    }
?>
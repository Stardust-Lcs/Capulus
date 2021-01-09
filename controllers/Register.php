<?php
class Register {
    function index() {
        View::load("templates/header", [
            'active_register' => True
        ]);
        View::load('register');
        View::load("templates/footer");
    }

    function userRegister() {
        $validationMessages = [];
        if (!isset($_POST['username'])) {
            $validationMessages['username'] = 'Username is required!';
        }
        if (!isset($_POST['email'])) {
            $validationMessages['email'] = 'Email is required!';
        }
        if (!isset($_POST['fullname'])) {
            $validationMessages['fullname'] = 'Full name is required!';
        }
        if (!isset($_POST['password'])) {
            $validationMessages['password'] = 'Password is required!';
        }

        if ($validationMessages) {
            return Response::json(null, $validationMessages, 400);
        }

        $username = htmlentities($_POST['username'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $fullname = htmlentities($_POST['fullname'], ENT_QUOTES);
        $password = htmlentities($_POST['password'], ENT_QUOTES);

        $user = new User();
        $user->id = GUIDv4();
        $user->username = $username;
        $user->email = $email;
        $user->fullname = $fullname;
        $user->password = $password;

        if ($user->insert()) {
            return Response::json(null, 'Success');
        }

        return Response::json(null, "Failed", 400);
    }
}

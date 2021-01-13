<?php
class Register {
    function index() {
        global $session;
        $alert = '';
        $flashData = $session->getFlashData();

        if ($flashData !== null) {
            if (isset($flashData['alert'])) {
                $alert = $flashData['alert'];
                if (is_array($alert)) {
                    $alert = implode('<br/>', $alert);
                }
            }
        }
        View::load("templates/header", [
            'active_register' => True
        ]);
        View::load('register', ['alert' => $alert]);
        View::load("templates/footer");
    }

    function userRegister() {
        global $session;
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
        if (!isset($_POST['phone'])) {
            $validationMessages['phone'] = 'Phone is required!';
        }
        if (!isset($_POST['password'])) {
            $validationMessages['password'] = 'Password is required!';
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $username = htmlentities($_POST['username'], ENT_QUOTES);
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $fullname = htmlentities($_POST['fullname'], ENT_QUOTES);
        $password = htmlentities($_POST['password'], ENT_QUOTES);
        $phone = htmlentities($_POST['phone'], ENT_QUOTES);

        $user = new User();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create account']);
            redirect_back();
        }
        $user->user_id = $guid;
        $user->username = $username;
        $user->email = $email;
        $user->fullname = $fullname;
        $user->password = password_hash($password, PASSWORD_ARGON2ID);
        $user->phone = $phone;

        if ($user->insert()) {
            $session->setFlashData(['success' => 'Account Created']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Failed to create account']);
        redirect_back();
    }
}

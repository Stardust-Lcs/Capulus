<?php
class Auth {
    public function userLogin() {
        global $session;
        if ($session->get('user_id') !== null) {
            Response::json(null, 'Already logged in');
            redirect_back();
        }

        $user = new User();

        if (isset($_POST))
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                $pass = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
                $row = $user->get(['user_id', 'username', 'password'], "email = '$email'");
                readable_var_dump($row);
                if ($row) {
                    if (password_verify($pass, $row[0]->password)) {
                        $session->set('user_id', $row[0]->user_id);
                        $session->set('username', $row[0]->username);
                        redirect(baseURL('dashboard'));
                    }
                }

                $session->setFlashData(['alert' => 'Login gagal!']);
                redirect_back();
            }

        Response::Error404();
    }

    public function userLogout() {
        global $session;
        $session->destroy();
        redirect(baseURL());
    }
}

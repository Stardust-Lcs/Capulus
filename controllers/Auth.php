<?php
class Auth {
    public function userLogin() {
        global $session;
        try {
            $session->get('user_id');
            return Response::json(null, 'Already logged in', 400);
        } catch (Exception $ex) {
        }

        $user = new User();

        if (isset($_POST))
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                $pass = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
                $row = $user->get([], "email = '$email' AND password = '$pass'");

                if ($row) {
                    $session->set('user_id', $row[0]->id);
                    return Response::json($row, 'Success');
                } else {
                    return Response::json(null, 'Failed', 400);
                }
            }

        Response::Error404();
    }

    public function userLogout() {
        global $session;
        $session->destroy();
    }
}

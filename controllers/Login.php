<?php
class Login {
    function index() {
        global $session;
        $alert = '';
        $flashData = $session->getFlashData();
        $user = $session->get('user');
        readable_var_dump($user);
        if ($user !== null) {
            if ($user->is_cafe_owner) {
                redirect(baseURL('dashboard'));
            }
            redirect(baseURL());
        }

        if ($flashData !== null) {
            if (isset($flashData['alert'])) {
                $alert = $flashData['alert'];
            }
        }
        View::load("templates/header", [
            'active_login' => True
        ]);
        View::load('login', [
            'alert' => $alert,
        ]);
        View::load("templates/footer");
    }
}

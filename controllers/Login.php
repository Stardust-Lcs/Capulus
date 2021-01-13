<?php
class Login {
    function index() {
        global $session;
        $alert = '';
        $flashData = $session->getFlashData();
        if ($flashData !== null) {
            if (isset($flashData['alert'])) {
                $alert = $flashData['alert'];
            }
        }
        View::load("templates/header", [
            'active_login' => True
        ]);
        View::load('login', ['alert' => $alert]);
        View::load("templates/footer");
    }
}

<?php
class Dashboard {
    function index() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        View::load('dashboard/dashboard', ['username' => $session->get('username')]);
    }
}

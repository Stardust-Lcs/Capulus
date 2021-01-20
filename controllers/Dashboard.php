<?php
class Dashboard {
    function index() {
        redirect(baseURL('dashboard/your-cafe'));
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        View::load('dashboard/dashboard', ['username' => $session->get('username')]);
    }
}

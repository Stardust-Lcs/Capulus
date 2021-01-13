<?php
class Tables {
    function dashboard() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        View::load('dashboard/tables', ['username' => $session->get('username')]);
    }
}

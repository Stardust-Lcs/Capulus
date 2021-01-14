<?php
class settingProfile
{
    function dashboard()
    {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        View::load('settingProfile/tables', ['username' => $session->get('username')]);
    }
}

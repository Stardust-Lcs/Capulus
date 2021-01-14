<?php
require_once __ROOT__ . 'engine/exceptions/SessionException.php';

class Session {
    public function __construct() {
        session_start();
    }

    public function get($name) {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];

        return null;
    }

    public function set($name, $value) {
        if (session_status() === PHP_SESSION_DISABLED)
            throw new SessionException('Session is not enabled!');

        $_SESSION[$name] = $value;
    }

    public function getFlashData() {
        $flashdata = $this->get('flashdata');
        unset($_SESSION['flashdata']);
        return $flashdata;
    }

    public function setFlashData($value) {
        $this->set('flashdata', $value);
    }

    public function getID() {
        return session_id();
    }

    public function destroy() {
        $result = session_unset() && session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        if (!$result) {
            throw new SessionException('Can not destroy session. SessionID: ' . $this->getID());
        }

        return $result;
    }
}

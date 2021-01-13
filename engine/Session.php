<?php
require_once __ROOT__ . 'engine/exceptions/SessionException.php';

class Session {
    public function __construct() {
        session_start();
    }

    public function set($name, $value) {
        if (session_status() === PHP_SESSION_DISABLED)
            throw new SessionException('Session is not enabled!');

        $_SESSION[$name] = $value;
        return $_SESSION;
    }

    public function get($name) {
        if (isset($_SESSION[$name]))
            return $_SESSION[$name];

        throw new SessionException("Session $name doesn't exists.");
    }

    public function getID() {
        return session_id();
    }

    public function destroy() {
        session_unset();
        session_destroy();
    }
}

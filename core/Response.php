<?php
class Response {
    public static function Error($status_code, $message) {
        http_response_code($status_code);
        View::load('errors/generic', ['status_code' => $status_code, 'message' => $message]);
    }

    public static function Error404() {
        self::Error(404, 'Not Found');
    }
}

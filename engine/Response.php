<?php
class Response {
    public static function json($data, $message = '', $status_code = 200) {
        $data = [
            'data' => $data,
            'message' => $message
        ];
        http_response_code($status_code);
        $json = json_encode($data);

        if ($json) {
            echo $json;
            return $json;
        }

        http_response_code(500);
        throw new Exception('Cannot encode data to JSON string');
    }

    public static function Error($status_code, $message) {
        http_response_code($status_code);
        View::load('errors/generic', ['status_code' => $status_code, 'message' => $message]);
    }

    public static function Error404() {
        self::Error(404, 'Not Found');
    }
}

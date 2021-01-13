<?php
if (!function_exists('baseURL')) {
    /**
     * Returns Base URL
     * 
     * Append uri argument to base_url.
     * base_url is set in config.php
     * 
     * @param string $uri
     * @return string
     */
    function baseURL($uri = '') {
        return Loader::getConfig('base_url') . $uri;
    }
}

if (!function_exists('checkPOSTData')) {
    /**
     * Returns whether the specified
     * POST data exists or not
     * 
     * @param array|string $names
     * @return bool
     */
    function checkPOSTData($names) {
        if (is_array($names)) {
            $result = isset($_POST[$names[0]]);
            foreach ($names as $name) {
                $result = $result && isset($name);
            }

            return $result;
        }

        return isset($_POST[$names]);
    }
}

if (!function_exists('redirect')) {
    function redirect($url, $status_code = 302) {
        http_response_code($status_code);
        header('Location: ' . $url);
        die();
    }
}

if (!function_exists('redirect_back')) {
    function redirect_back($status_code = 302) {
        redirect($_SERVER['HTTP_REFERER'], $status_code);
    }
}

if (!function_exists('readable_var_dump')) {
    function readable_var_dump($var, $use_print_r = false) {
        echo '<pre>';
        if ($use_print_r) print_r($var);
        else var_dump($var);
        echo '</pre>';
    }
}

if (!function_exists('GUIDv4')) {
    /**
     * Returns a GUIDv4 string
     *
     * Uses the best cryptographically secure method
     * for all supported platforms 
     *
     * @param bool $trim
     * @return string
     */
    function GUIDv4($trim = true) {
        // Windows
        if (function_exists('com_create_guid') === true) {
            if ($trim === true)
                return trim(com_create_guid(), '{}');
            else
                return com_create_guid();
        }

        // OSX/Linux
        if (function_exists('openssl_random_pseudo_bytes') === true) {
            $data = openssl_random_pseudo_bytes(16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10

            if ($trim === true)
                return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
            else
                return vsprintf('{%s%s-%s-%s-%s-%s%s%s}', str_split(bin2hex($data), 4));
        }

        throw new Exception('GUID Not Supported');
    }
}

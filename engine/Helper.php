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

if (!function_exists('random_str')) {
    /**
     * Generate a random string, using a cryptographically secure 
     * pseudorandom number generator (random_int)
     *
     * This function uses type hints now (PHP 7+ only), but it was originally
     * written for PHP 5 as well.
     * 
     * For PHP 7, random_int is a PHP core function
     * For PHP 5.x, depends on https://github.com/paragonie/random_compat
     * 
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     * @return string
     */
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}

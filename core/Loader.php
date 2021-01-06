<?php
class Loader {
    public static function load($file_path, $variables = array()) {
        $output = NULL;

        if (stristr($file_path, '.php') === FALSE) {
            $file_path = $file_path . '.php';
        }

        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();
        // Include the template file
        include_once __ROOT__ . $file_path;
        // End buffering and return its contents
        $output = ob_get_clean();

        return $output;
    }
}

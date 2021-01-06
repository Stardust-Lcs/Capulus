<?php
class View {
    static function load($file_path, $variables = array()) {
        print Loader::load('pages/' . $file_path, $variables);
    }
}

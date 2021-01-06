#!/usr/bin/php
<?php
if (stripos(php_sapi_name(), 'cli') === false) {
    printf("This file must be executed from CLI\n");
    exit();
}

$cwd = dirname(__FILE__) . '/public';

$process = proc_open('php -S localhost:8000', [STDOUT], $pipes, $cwd, null, ['bypass_shell' => true]);

if (is_resource($process)) {
    proc_close($process);
}

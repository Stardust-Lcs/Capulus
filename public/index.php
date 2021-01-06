<?php
define('__ROOT__', dirname(dirname(__FILE__)) . '/');
require_once __ROOT__ . 'config.php';
require_once __ROOT__ . 'core/View.php';

View::load($config->default_view, ["message" => "Hello, world!"]);

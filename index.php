<?php
session_start();

defined('BASE_URL') or define('BASE_URL', 'http://localhost/index.php/');
defined('BASE_PATH') or define('BASE_PATH', __DIR__);

defined('APP_PATH') or define('APP_PATH', BASE_PATH . '/application//');
defined('VIEW_PATH') or define('VIEW_PATH', APP_PATH . 'views//');
defined('CORE_PATH') or define('CORE_PATH', APP_PATH . 'core//');
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH . 'config//');

require_once CORE_PATH . 'autoload.php';
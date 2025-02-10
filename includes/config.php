<?php


// Load Environment Variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

// Define default constant variables
define('ROOT_PATH', dirname(__DIR__) . '/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('CONFIG_PATH', ROOT_PATH . 'config/');
define('TEMPLATES_PATH', ROOT_PATH . 'templates/');
define('ASSETS_PATH', ROOT_PATH . 'assets/');

// Database configuration constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'zimlotto');
define('DB_USER', 'root');
define('DB_PASS', 'password');

// Other constants
define('SITE_NAME', 'ZimLotto');
define('SITE_URL', 'http://localhost/zimlotto/');

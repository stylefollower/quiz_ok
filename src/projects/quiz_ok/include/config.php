<?php
session_start();

if (strpos($_SERVER['HTTP_HOST'], 'localhost:') !== false) {
    // DB runs in local Docker container: localhost
    define('DB_HOST', getenv('DB_HOST'));
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
}
else {
    define('DB_HOST', 'ipiluwig.mysql.db.internal');
    define('DB_NAME', 'ipiluwig_OK');
    define('DB_USER', 'ipiluwig_19');
    define('DB_PASSWORD', 'skateboard');
}

// define('DB_NAME', 'NAME');

/*
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
*/

/*
define('DB_NAME', 'ipiluwig_OK');
define('DB_USER', 'ipiluwig_19');
define('DB_PASSWORD', 'skateboard');
define('DB_HOST', 'ipiluwig.mysql.db.internal');
*/

$connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);

/*
Host: ipiluwig.mysql.db.internal
Name: ipiluwig_OK
User: ipiluwig_19
Password: skateboard
*/

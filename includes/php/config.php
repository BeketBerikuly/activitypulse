<?php
// Development connection
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'se');

// Remote database coonection
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'O131yK0GMe');
define('DB_PASSWORD', 'Dnclv4C2sS');
define('DB_DATABASE', 'O131yK0GMe');


$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

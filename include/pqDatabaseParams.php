<?php

$host = "localhost";
$dbName = "peoplesq";

$dbUsername = "root";
$dbPassword = "";

$bcryptOptions = array('cost' => 11);
$salt = "So*~j+_fFzk8KoAISKTuvAtD|YrZrsDf31yleIK4KKw3hU1*jsBjq8Z 4t_-";

define("DB_DSN", "mysql:host=$host; dbname=$dbName;" );

define("DB_USERNAME", $dbUsername);
define("DB_PASSWORD", $dbPassword);

//define("BCRYPT_OPT", $bcryptOptions);
define("SALT", $salt);

?>
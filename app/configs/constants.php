<?php
define("MIDDLEWARE", "middleware");

define("DB_NAME", "filerouge");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
// todo: remove password from db


$arr = explode("\\", dirname(dirname(__DIR__)));
$projectName = end($arr);
define("PROJECT_NAME", $projectName);


//roles
define("ROLE_ADMIN", "admin");
define("ROLE_GUEST", "guest");
define("ROLE_HOST", "host");

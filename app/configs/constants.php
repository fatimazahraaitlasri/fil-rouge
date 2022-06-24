<?php
define("MIDDLEWARE", "middleware");

define("DB_NAME", "filerouge");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
// todo: remove password from db


$arr = explode("\\", dirname(dirname(__DIR__)));
$projectName = end($arr);
define("PROJECT_NAME", $projectName);


//roles
const ROLE_ADMIN = "admin";
const ROLE_GUEST = "guest";
const ROLE_HOST = "host";

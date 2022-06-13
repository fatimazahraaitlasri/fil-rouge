<?php
//  mkhatrin bili rak ghadi tnsay kifach middleware kaykhdam 10/04/2022
define("MAIN_PATIENT_KEY", "reference");
define("MIDDLEWARE", "middleware");

define("DB_NAME", "filerouge");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");


$arr = explode("\\", dirname(dirname(__DIR__)));
$projectName = end($arr);
define("PROJECT_NAME", $projectName);

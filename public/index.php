<?php

require_once dirname(__DIR__) . "/app/configs/index.php";
require_once "autoload.php";

require_once dirname(__DIR__) . "/vendor/autoload.php";

$params = ["home"];

if (isset($_GET["url"])) {

    $url = $_GET["url"];
    $params = explode("/", rtrim($url, "/"));
}


function serve($param)
{
    $controller = ucfirst($param[0]) . "Controller";
    $controllerPath = dirname(__DIR__) . "/app/controllers/$controller.php";
    if (file_exists($controllerPath)) {
        require_once($controllerPath);
        if (class_exists($controller)) {
            $objet = new $controller;
            $method = $param[1] ?? "index";

            if (method_exists($objet, $method)) {
                // la méthode dispose-t-elle d'un middleware
                Middleware::processRequest($objet, $method);
                $objet->$method($param[2] ?? null);
                return;
            }
        }
    } elseif (isset($param[0])) {
        $newParams = ["home", ...$param];
        return serve($newParams);
    }
    return view("app", ["data" => ["user" => "test"]]);
}

serve($params);

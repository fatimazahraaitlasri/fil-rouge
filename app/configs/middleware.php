<?php

class Middleware
{
    static public function auth()
    {
        if (!isLoggedIn()) {
            return redirect("/login");
        }

        return true;
    }


    static public function assign($instance, $methods, $middlewares)
    {
        $arr = [];
        foreach ($methods as $method) {

            $arr[$method] = [...($arr[$method] ?? []), ...$middlewares];
        }
        $instance->{MIDDLEWARE} = $arr;
    }

    static public function processRequest($instance, $methodName)
    {
        $instanceMiddlewareList = $instance->{MIDDLEWARE} ?? [];
        if (!isset($instanceMiddlewareList[$methodName])) {
            return true;
        }

        $methodMiddlwareList = $instanceMiddlewareList[$methodName];
        foreach ($methodMiddlwareList as $middlwareName) {
            $canContinue = call_user_func(self::class."::$middlwareName");
            if (!$canContinue) {
                exit(0);
            }
        }
    }
}

<?php

class Middleware
{
    static public function auth()
    {
        if (!Auth::check()) {
            return redirect("/login");
        }

        return true;
    }

    public static function admin()
    {
        if (!Auth::check(ROLE_ADMIN)) {
            return redirect("/login");
        }

        return true;
    }

    public static function host()
    {
        if (!Auth::check([ROLE_HOST, ROLE_ADMIN])) {
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

        $methodMiddlewareList = $instanceMiddlewareList[$methodName];
        foreach ($methodMiddlewareList as $middlewareName) {
            $canContinue = call_user_func(self::class."::$middlewareName");
            if (!$canContinue) {
                exit(0);
            }
        }
    }
}

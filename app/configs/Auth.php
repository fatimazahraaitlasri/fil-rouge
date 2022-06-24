<?php

class Auth
{
    static private $user = null;


    static public function check($role = null): bool
    {
        if (!isLoggedIn()) {
            return false;
        }
        self::$user = $_SESSION['user'];
        if ($role && self::$user->role != $role) {
            return false;
        }

        return true;
    }

    public function login($user)
    {
        createUserSession($user);
    }

    static public function user()
    {
        self::check();

        return self::$user;
    }


}
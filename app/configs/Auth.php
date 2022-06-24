<?php

class Auth
{
    static private $user = null;


    static public function check(array|string $role = null): bool
    {
        if (!isLoggedIn()) {
            return false;
        }
        self::$user = $_SESSION['user'];
        if ($role == null) {
            return true;
        }
        if (is_array($role)) {
            return in_array(self::$user->role, $role);
        }

        return self::$user->role == $role;
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
<?php

class Auth
{
    static private $user = null;


    /**
     * check if user is logged in or has the necessary role
     * @param  array|string|null  $role
     * @return bool
     */
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

    static public function login(object $user)
    {
        createUserSession($user);
    }

    static public function user(): object|null
    {
        self::check();

        return self::$user;
    }

    public static function logout()
    {
        logout();
    }

}
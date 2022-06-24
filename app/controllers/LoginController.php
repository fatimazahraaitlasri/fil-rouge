<?php

class LoginController
{


    private $UserModel;

    public function __construct()
    {
        $this->UserModel = new User;
    }


    public function index()
    {

//        if (isPostRequest() && verify(["name", "password"], $_POST)) {
//            $name = $_POST["name"];
//            $user = $this->UserModel->fetchByName($name);
//
//            if (!$user) {
//                return view("login");
//            }
//
//            createUserSession($user);
//            return redirect("/");
//        }

        return view("login");

    }


}

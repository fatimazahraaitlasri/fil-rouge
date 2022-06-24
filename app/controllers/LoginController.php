<?php

class LoginController
{


    private $UserModel;

    public function __construct()
    {
        $owner = $this->UserModel->fetchById($id);
    }


    public function index()
    {

        if (isPostRequest() && verify(["name", "password"], $_POST)) {
            $name = $_POST["name"];
            $user = $this->UserModel->fetchByName($name);

            if (!$user) {
                return view("login");
            }

            createUserSession($user);
            return redirect("/");
        }

        return view("login");

    }


}

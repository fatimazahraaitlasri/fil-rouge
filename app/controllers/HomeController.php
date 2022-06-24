<?php

class HomeController
{

    public function __construct()
    {
        $this->userModel = new User;


    }

    public function index()
    {
        $apartment = (object)[
            "id" => 1,
            "name" => "Apartment 1",
            "price" => 100,
            "description" => "This is the first apartment",
            "image" => "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
            "city" => "Paris",
            "country" => "France",
        ];

        return view("home", [
            "apartments" => array_fill(0, 6, $apartment),
            "hotels" => array_fill(0, 6, $apartment),
        ]);
    }

    public function login()
    {
        if (isPostRequest()) {
            $data = getBody();
            $user = $this->userModel->fetchByField("email", $data["email"]);
            if ($user && password_verify($data["password"], $user->password)) {
                Auth::login($user);

                return redirect("/");
            }

            return view("login", [
                "error" => "Wrong password or email",
            ]);
        }

        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function profile()
    {
        $property = (object)[
            "id" => 1,
            "name" => "Apartment 1",
            "price" => 100,
            "description" => "This is the first apartment",
            "image" => "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
            "city" => "Paris",
            "country" => "France",
            "owner_id" => 1,
        ];

        $user = (object)[
            "id" => 1,
            "name" => "John Doe",
            "email" => "hello@gmail.com",
            "role" => ROLE_HOST,
            "created_at" => "2020-01-01",
            "avatar" => "https://a0.muscache.com/im/pictures/user/77ed5bd3-8255-4829-9842-a476228e675f.jpg?aki_policy=profile_large",
            "about" => "I am a host",
        ];


        return view("profile", [
            "properties" => array_fill(0, 6, $property),
            "user" => $user,
        ]);
    }

    public function account()
    {
        $user = (object)[
            "id" => 1,
            "name" => "John Doe",
            "email" => "hello@gmail.com",
            "role" => ROLE_HOST,
            "created_at" => "2020-01-01",
            "avatar" => "https://a0.muscache.com/im/pictures/user/77ed5bd3-8255-4829-9842-a476228e675f.jpg?aki_policy=profile_large",
            "about" => "I am a host",
        ];

        return view("account", ["user" => $user, "title" => "My account", "button" => "Update Account"]);
    }

}

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
        ]);
    }

}

<?php

class HomeController
{

    public function __construct()
    {
        $this->userModel = new User;


    }
    public function index()
    {
        return view("home");
    }

    public function tester()
    {
        return view("tester");
    }
}

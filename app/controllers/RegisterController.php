<?php

class RegisterController
{
    private Property $propertyModel;
    private user $UserModel;

    public function __construct()
    {
        $this->propertyModel = new property;
        $this->UserModel = new user;
    }

    public function index(): bool
    {
        return view("app");
    }

    public function create(): bool
    {
        if (isPostRequest()) {
            $data = $_POST;
            $isUserCreated = $this->UserModel->create($data);
            if ($isUserCreated) {
                return json(array_keys($this->$isUserCreated));
            }
        }
        return view("propertyForm");
    }
}

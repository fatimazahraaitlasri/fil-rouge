<?php

class UsersController
{
    private User $userModel;
    private Property $propertyModel;

    public function __construct()
    {
        $this->userModel = new User;
        $this->propertyModel = new Property;
    }


    public function profile($id): bool
    {

        $user = $this->userModel->fetchById($id);
        if (!$user) {
            return view("404", ["message" => "User not found"]);
        }
        $properties = $this->propertyModel->fetchAll("where owner_id = :owner_id", [
            "owner_id" => $id,
        ]);

        return view("profile", [
            "properties" => $properties,
            "user" => $user,
        ]);
    }
}
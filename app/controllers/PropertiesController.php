<?php

class PropertiesController
{
    private $propertyModel;

    public function __construct()
    {
        $this->propertyModel = new Property;

    }

    public function index(): bool
    {

        return view("app", ["data" => ["test" => "hello world"]]);
    }

    public function all()
    {
        $type = query("type");
        return json([["name" => "fatima zahra", "message" => "noudi tna3si"]]);
    }

    public function create()
    {
        if (isPostRequest()) {
            $data = getBody();
            // redreict to desired voyage resveration
            $property = $this->propertyModel->create($data);
            $id = $this->propertyModel->getLastId();
            if ($property) {
                $session = createUserSession([...$data, "id" => $id["id"]]);

                return view("app");
            }
        }


    }


    public function delete($id)
    {

        if (!isLoggedIn()) {
            return redirect("/login");
        }
        $deleted = $this->propertyModel->fetchById($id);
        if (!$deleted) {
            return view("404");
        }
        if (!isOwner()) {
            return redirect("/");
        }

        return redirect("/Afichage");


        return view("app");
    }
}
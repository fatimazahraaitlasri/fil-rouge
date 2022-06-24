<?php

class PropertiesController
{
    public Property $propertyModel;
    private user $UserModel;

    public function __construct()
    {
        $this->propertyModel = new Property;
        $this->UserModel = new user;

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

        $title = "Properties";
        if ($_GET["type"] ?? null) {
            $title = $_GET["type"] == "apartment" ? "Apartments" : "Hotels";
        }

        return view("properties", [
            "properties" => array_fill(0, 10, $apartment),
            "title" => $title,
        ]);
    }

///properties/getProperty/(id) GET request
    public function getProperty($id): bool
    {
//        if (isGetRequest()) {
//            $property = $this->propertyModel->fetchById($id);
//            if (!$property) {
//                return view("404");
//            }
//
//            return json(array_keys($this->$property));
//        }
        $details = (object)[
            "country" => "spain",
            "city" => "Barcelona",
            "address" => "JL. Camplung Tanduk N 10",
            "price" => 465,
            "type" => "hotel",
            "image" => "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
            "description" => "something about this hotel",
            "name" => "hotel indigo Bali Seminyak Beach",
        ];

        return view("property", [
            "property" => $details,
        ]);

    }

///properties/createProperty /POST request katakhoud data dial property
    public function create()
    {
//        if(!Auth::check(ROLE_HOST)){
//            return redirect("/login");
//        }
        return view("propertyForm", ["title" => "Create Property", "action" => "#", "button" => "Create"]);
//        if (isLoggedIn() && currentUserRole() == OWNER) {
//            $data = $_POST;
//            $isPropertyCreated = $this->propertyModel->create($data);
//            if ($isPropertyCreated) {
////            return redirect("profile owner");
//            }
//
//            return view("propertyForm");
//
////
//        }
    }

///properties/updateProperty/(id) Post request

    public function update($id)
    {
        //        if(!Auth::check(ROLE_HOST)){
//            return redirect("/login");
//        }

        $apartment = (object)[
            "id" => 1,
            "name" => "Apartment 1",
            "price" => 100,
            "description" => "This is the first apartment",
            "address" => "JL. Camplung Tanduk N 10",
            "image" => "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=780&q=80",
            "city" => "Paris",
            "country" => "France",
        ];


        return view(
            "propertyForm",
            ["title" => "Update Property", "action" => "#", "button" => "Update", "data" => $apartment]
        );
//        if (!isLoggedIn()) {
//            return redirect("/login");
//        }
//        $owner = $this->UserModel->fetchById($id);
//        if (!$owner) {
//            return view("404");
//        }
//        if ($owner["id"] != currentUserId() && $owner["role"] != currentUserRole()) {
//            return redirect("/");
//        }
//        if (!isPostRequest()) {
//            return view("update", ["data" => $owner]);
//        }
//        $updateProperty = $this->propertyModel->update($_POST, "id", $owner,);
//        echo("valider");
    }

///properties/deleteProperty/(id) get request
    public function delete($id)
    {

        $property = $this->propertyModel->fetchById($id);
        $owner = $this->UserModel->fetchById($id);

        if (!$property) {
            return View("404", ["id" => $id]);
        }
        if ($owner["id"] !== currentUserId() && $owner["role"] !== currentUserRole()) {
            ;
        }

        return redirect("/");
        $isDeleted = $this->propertyModel->deleteById($id);
        if (!$isDeleted) {
            return bladeView("/history", ["error" => "$id not deleted"]);
        }

        return redirect("/history");
    }

///properties/all/(type) => t9dar tjiha type t9dar matjich lmohim 3titek type fi lien 3tini ghir proprties li 3andhom dak type si non jib properties kamlin
    public function all($propertyType): bool
    {
        if ($propertyType !== "apartment" && $propertyType !== "hotel" && $propertyType !== "") {
            $property = $this->propertyModel->fetchAllProperties();

            return json(array_keys($this->$property));
        }
        $property = $this->propertyModel->fetchAll("where typeProperty =:type", ["type" => $propertyType]);

        return json(array_keys($this->$property));
    }
}
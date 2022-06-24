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

///properties/getProperty/(id) GET request
    public function getProperty($id): bool
    {
        if (isGetRequest()) {
            $property = $this->propertyModel->fetchById($id);
            if (!$property) {
                return view("404");
            }
            return json(array_keys($this->$property));
        }
    }

///properties/createProperty /POST request katakhoud data dial property
    public function create()
    {
        if (isLoggedIn() && currentUserRole() == OWNER) {
            $data = $_POST;
            $isPropertyCreated = $this->propertyModel->create($data);
            if ($isPropertyCreated) {
//            return redirect("profile owner");
            }
            return view("propertyForm");

//
        }
    }

///properties/updateProperty/(id) Post request

    public function Update($id)
    {
        if (!isLoggedIn()) {
            return redirect("/login");
        }
        $owner = $this->UserModel->fetchById($id);
        if (!$owner) {
            return view("404");
        }
        if ($owner["id"] != currentUserId() && $owner["role"] != currentUserRole()) {
            return redirect("/");
        }
        if (!isPostRequest()) {
            return view("update", ["data" => $owner]);
        }
        $updateProperty = $this->propertyModel->update($_POST, "id", $owner,);
        echo("valider");
    }

///properties/deleteProperty/(id) get request
    public function delete($id)
    {

        $property = $this->propertyModel->fetchById($id);
        $owner = $this->UserModel->fetchById($id);

        if (!$property)
            return View("404", ["id" => $id]);
        if ($owner["id"] !== currentUserId() && $owner["role"] !== currentUserRole()) ;
        return redirect("/");
        $isDeleted = $this->propertyModel->deleteById($id);
        if (!$isDeleted) return bladeView("/history", ["error" => "$id not deleted"]);
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
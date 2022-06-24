<?php

class PropertiesController
{
    public Property $propertyModel;
    private User $userModel;
    private Comment $commentModel;

    public function __construct()
    {
        $this->propertyModel = new Property;
        $this->userModel = new User;
        $this->commentModel = new Comment;

        Middleware::assign($this, ["create", "update", "delete"], ["host"]);

    }

    public function index()
    {

        $title = "Properties";
        if ($_GET["type"] ?? null) {
            $title = $_GET["type"] == "apartment" ? "Apartments" : "Hotels";
        }
        $filter = [];
        foreach ($_GET as $key => $value) {
            if (!$value) {
                unset($_GET[$key]);
                continue;
            }
            if ($key == "address") {
                $filter[] = "(city like :$key or country like :$key or address like :$key)";
                $_GET[$key] = "%$value%";
                continue;
            }
            $filter[] = "$key = :$key";
        }
        $query = implode(" and ", $filter);
        if ($query) {
            $query = "where $query";
        }
        $properties = $this->propertyModel->fetchAll($query, $_GET);

        return view("properties", [
            "properties" => $properties,
            "title" => $title,
        ]);
    }

    public function getProperty($id): bool
    {


        $property = $this->propertyModel->fetchById($id);
        if (!$property) {
            return view("404", ["message" => "Property not found"]);
        }
        $comments = $this->commentModel->findCommentsByPropertyId($id);
        $authorMapById = [$property->owner_id => null];

        if ($comments) {
            // fetch authors for each comment
            foreach ($comments as $comment) {
                $authorMapById[$comment->user_id] = null;
            }
        }
        $authors = $this->userModel->fetchManyByFieldIn("id", array_keys($authorMapById));
        foreach ($authors as $author) {
            $authorMapById[$author->id] = $author;
        }
        foreach ($comments as $comment) {
            $comment->author = $authorMapById[$comment->user_id];
        }

        return view("property", [
            "property" => $property,
            "comments" => $comments,
            "owner" => $authorMapById[$property->owner_id],
        ]);

    }

    public function create()
    {
        if (isPostRequest()) {
            $data = getBody();
            $requiredFields = ["name", "type", "address", "city", "country", "price", "description", "image", "guests"];
            if (verify($requiredFields, $data)) {
                $data["owner_id"] = Auth::user()->id;
                $propertyId = $this->propertyModel->create($data);

                return redirect("/properties/getProperty/$propertyId");
            }
        }

        return view("propertyForm", ["title" => "Create Property", "action" => "#", "button" => "Create"]);
    }


    public function update($id)
    {
        $property = $this->propertyModel->fetchById($id);
        if (!$property) {
            return view("404", ["message" => "Property not found"]);
        }
        if (isPostRequest()) {
            if (!Auth::check(ROLE_ADMIN) && Auth::user()->id != $property->owner_id) {
                return view("403", ["message" => "You are not authorized to edit this property"]);
            }
            $data = getBody();
            $this->propertyModel->updateById($id, $data);

            return redirect("/properties/getProperty/$id");
        }


        return view(
            "propertyForm",
            ["title" => "Update Property", "action" => "#", "button" => "Update", "data" => $property]
        );
    }

    public function delete($id)
    {
        $property = $this->propertyModel->fetchById($id);
        if (!$property) {
            return view("404", ["message" => "Property not found"]);
        }
        if (Auth::user()->id != $property->owner_id && !Auth::check(ROLE_ADMIN)) {
            return view("403", ["message" => "You are not authorized to delete this property"]);
        }
        $this->propertyModel->deleteById($id);

        return redirect("/properties");
    }
}
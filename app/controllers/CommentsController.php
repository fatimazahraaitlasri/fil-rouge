<?php

class CommentsController
{

    private Comment $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment;
        Middleware::assign($this, ["create"], ["auth"]);
    }

    public function create($propertyId): bool
    {
        if (!isPostRequest()) {
            return redirect("/properties/getProperty/$propertyId");
        }
        $user = Auth::user();
        $body = getBody();
        if (verify(["comment"], $body)) {
            $this->commentModel->create([
                "user_id" => $user->id,
                "property_id" => $propertyId,
                "content" => $body["comment"],
            ]);
        }

        return redirect("/properties/getProperty/$propertyId");
    }

}
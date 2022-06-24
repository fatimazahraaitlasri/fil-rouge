<?php

class CommentsController
{

    private Comment $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment;
    }

    public function create($propertyId): bool
    {
        if (!isPostRequest()) {
            return redirect("/");
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
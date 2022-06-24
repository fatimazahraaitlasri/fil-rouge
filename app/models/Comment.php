<?php

class Comment extends Model
{
    protected $tableName = "comments";

    public function findCommentsByPropertyId($id): bool|array
    {
        return $this->fetchManyByField("property_id", $id);
    }
}




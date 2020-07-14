<?php
namespace Corp\Repositories;
use Corp\Comment;

class CommetnsRepository extends Repository{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}

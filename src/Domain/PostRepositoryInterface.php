<?php

namespace Domain\Repository;

use Domain\Post;


interface PostRepositoryInterface
{
    public function create(Post $post);
}
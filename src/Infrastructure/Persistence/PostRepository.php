<?php


namespace Infrastructure\Persistence;


use Domain\Post;
use Domain\Repository\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public $posts = [];

    public function create(Post $post)
    {
        $this->posts[] = $post;

        // Obviously, this is for testing purposes only
        echo "Post with id {$post->id} was created.";
    }
}
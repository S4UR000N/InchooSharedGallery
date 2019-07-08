<?php

// namespace
namespace app\super;

final class Post
{
    private $post;

    public function __construct()
    {
        //add $_POST to our $post property
        $this->post = $_POST;
    }

    public function getPostDatasArray()
    {
        return $this->post;
    }
}
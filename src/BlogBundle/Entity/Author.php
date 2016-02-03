<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Author
{
    private $id;

    private $name;

    private $slug;

    private $email;

    private $posts;

    public function __construct() {
        $this->posts = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post)
    {
        $this->posts->add($post);
    }

    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);
    }
}

<?php

namespace BlogBundle\Entity;

use Cocur\Slugify\Slugify;

class Post
{
    private $id;

    private $title;

    private $slug;

    private $content;

    private $author;

    private $createdDate;

    public function __construct()
    {
        $this->createdDate = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $slug = new Slugify();
        $this->slug = $slug->slugify($title);
        $this->title = $title;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
        $author->addPost($this);
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;
    }
}

<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorsController extends Controller
{
    public function singleAction($slug)
    {
        $author = $this->getAuthorRepository()->findBySlug($slug);

        return $this->render('BlogBundle:Authors:detail.html.twig', [
            'author' => $author
        ]);
    }

    /**
     * @return AuthorRepository
     */
    private function getAuthorRepository()
    {
        return $this->getDoctrine()->getRepository('BlogBundle:Author');
    }
}

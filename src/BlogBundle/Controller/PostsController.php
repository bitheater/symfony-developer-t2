<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use BlogBundle\Entity\PostRepository;
use BlogBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostsController extends Controller
{
    public function indexAction(Request $request)
    {
        $query = $this->getPostRepository()->findPostsWithAuthorQuery();

        $paging  = $this->get('knp_paginator');
        $posts = $paging->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('BlogBundle:Posts:index.html.twig', [
            'posts' => $posts
        ]);
    }

    public function singleAction($slug)
    {
        $post = $this->getPostRepository()->findBySlug($slug);

        return $this->render('BlogBundle:Posts:detail.html.twig', [
            'post' => $post
        ]);
    }

    public function addAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('blog_homepage');
        }

        return $this->render('BlogBundle:Posts:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @return PostRepository
     */
    private function getPostRepository()
    {
        return $this->getDoctrine()->getRepository('BlogBundle:Post');
    }
}

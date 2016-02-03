<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    public function findPostsWithAuthorQuery()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p, a')
            ->innerJoin('p.author',  'a')
            ->orderBy('p.createdDate', 'desc')
            ->getQuery();

        return $query;
    }

    public function findBySlug($slug)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p, a')
            ->innerJoin('p.author',  'a')
            ->andWhere('p.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery();

        return $query->getSingleResult();
    }

}

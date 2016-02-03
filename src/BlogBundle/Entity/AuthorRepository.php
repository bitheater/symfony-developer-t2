<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    public function findBySlug($slug)
    {
        $query = $this->createQueryBuilder('a')
            ->select('a, p')
            ->innerJoin('a.posts',  'p')
            ->andWhere('a.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery();

        return $query->getSingleResult();
    }

}

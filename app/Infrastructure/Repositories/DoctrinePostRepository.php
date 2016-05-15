<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\PostRepository;
use Doctrine\ORM\EntityRepository;

class DoctrinePostRepository extends EntityRepository implements PostRepository
{
    /**
     * Get all Posts
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Post[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }
}

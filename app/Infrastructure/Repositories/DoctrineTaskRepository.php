<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\TaskRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineTaskRepository extends EntityRepository implements TaskRepository
{
    /**
     * Get all Tasks
     *
     * @param string $orderField
     * @param string $order
     *
     * @return \App\Domain\Entities\Task[]
     */
    public function all($orderField = 'id', $order = 'ASC')
    {
        return $this->findBy([], [$orderField => $order]);
    }

    public function ownerAll($owner)
    {
        return $this->findBy(['owner'=>$owner]);
    }
}

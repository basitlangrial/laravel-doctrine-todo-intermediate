<?php

namespace App\Infrastructure\Mappings\Fluent;

use App\Domain\Entities\Task;
use App\Domain\Entities\User;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class TaskMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Task::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');

        $builder->string('name');
          $builder->manyToOne(User::class,'owner');

       $builder->timestamps();
        //$builder->timestamp('updatedAt');
    }
}

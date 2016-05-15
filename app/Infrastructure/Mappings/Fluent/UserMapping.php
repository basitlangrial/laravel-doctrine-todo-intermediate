<?php

namespace App\Infrastructure\Mappings\Fluent;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\Name;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;


class UserMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return User::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');

        $builder->embed(Name::class)->noPrefix();
        $builder->string('email');
        $builder->string('password');

        $builder->rememberToken();
        $builder->timestamps(); // Creates both createdAt and updatedAt
    }
}

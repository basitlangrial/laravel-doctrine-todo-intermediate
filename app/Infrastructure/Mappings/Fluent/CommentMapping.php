<?php

namespace App\Infrastructure\Mappings\Fluent;

use App\Domain\Entities\Post;
use App\Domain\Entities\Comment;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class CommentMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Comment::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');

        $builder->string('comment');
        //$builder->string('post');
       $builder->manyToOne(Post::class,'post');


       $builder->timestamps();
        //$builder->timestamp('updatedAt');
    }
}

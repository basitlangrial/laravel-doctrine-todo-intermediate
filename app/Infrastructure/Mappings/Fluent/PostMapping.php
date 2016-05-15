<?php

namespace App\Infrastructure\Mappings\Fluent;

use App\Domain\Entities\Post;
use App\Domain\Entities\Comment;
use App\Domain\Entities\User;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class PostMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return Post::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');

        $builder->string('title');
        $builder->string('body');
        $builder->manyToOne(User::class,'author');
        /**
     * @OneToMany(targetEntity="Comment", mappedBy="post",
     *   cascade={"persist"})
     **/
      //  $builder->oneToMany(Comment::class);
        //$builder->belongsToMany(Comment::class, 'comments')->joinColumn('post_id', 'comment_id', true);
        //$builder->manyToMany(Comment::class, 'comments')->joinColumn('post', 'comments', true);


       $builder->timestamps();
        //$builder->timestamp('updatedAt');
    }
}

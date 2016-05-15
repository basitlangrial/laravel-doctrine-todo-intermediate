<?php
namespace App\Domain\Entities;

use App\Domain\Entities\Post;
use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
/**
 * @ORM\Entity()
 */
class Comment
{
    use Timestamps;
    
    /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="text") **/
    protected $comment;
    /**
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     **/
    protected $post;

    public function __construct(Post $post, $text)
    {
        $this->post = $post;
        $this->comment = $text;
    }
}


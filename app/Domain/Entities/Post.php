<?php
namespace App\Domain\Entities;

use App\Domain\Entities\User;
use App\Domain\Entities\Comment;
use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity()
 */
class Post
{
    use Timestamps;
    protected $id;
    protected $title;
    protected $body;
       /**
     * @ManyToOne(targetEntity="User")
     **/
    protected $author;
  /**
     * @OneToMany(targetEntity="Comment", mappedBy="post",
     *   cascade={"persist"})
     **/
    protected $comments;

    public function __construct(User $author)
    {
        $this->author = $author;
        $this->posts = new ArrayCollection();
    }
    public function getTitle(){
        return $this->title;
    }

    public function addComment($text)
    {
        $this->comments[] = new Comment($this, $text);
    }
}

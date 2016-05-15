<?php

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use App\Domain\ValueObjects\Name;
use App\Domain\ValueObjects\Email;
use LaravelDoctrine\ORM\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * @ORM\Entity()
 */
class User implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract
{
    use Authenticatable, Timestamps, CanResetPassword, Authorizable;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * The name value object which holds the
     * first and last name of the user
     * @ORM\Embedded(class="App\Domain\ValueObjects\Name", columnPrefix=false)
     *
     * @var Name
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @var Email
     */
    protected $email;

   /**
     * @ORM\Column(type="string")
     * @var Password
     */
    protected $password;
    /**
     * @param Name   $name
     * @param string $email
     */
    public function __construct(Name $name, $email,$password)
    {
        $this->email = $email;
        $this->name  = $name;
        $this->password= $password;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAuthIdentifierName()
    {
        $fname = $this->name->getFirstname();
        return $fname;
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

}

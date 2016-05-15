<?php
namespace App\Research;

class Scientist
{
    /**
     * @var int
     */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $email;

    /**
     * @param string $firstName
     * @param string $lastName
     */
    
    public function __construct($firstName, $lastName, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getId(){
        return $this->id;
    }
     public function getFirstName(){
        return 'Hello '.$this->firstName;
    }
     public function getLastName(){
        return $this->lastName;
    }
     public function getEmail(){
        return $this->email;
    }
    public function all(){
        return [$this->getId(), $this->getFirstName(), $this->getLastName(), $this->getEmail()];
    }
}
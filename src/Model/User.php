<?php

namespace App\Model;

Class User {


    /**
     * @var int
     */
    private $id;
        /**
     * @var string
     */
    private $role;
    /** 
     * 
     * @var string 
     */
    private $username;

    /**
     *  @var string
     */
    private $password;


    public function getUsername() : ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;    

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }
}

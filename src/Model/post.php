<?php
namespace App\Model;




class Post {

    private $id;

    private $slug;

    private $name;

    private $content;

    private $created_at;

    private $cathegorie = [];


    public function getName (): ?string

    {
        return $this->name;
    }




}
<?php


class User {

  private $name;
  private $email;
  private $taille;

  public function __construct(){

    $this->name  = "User";
    $this->email = "tata@toto.com";
    $this->taille = 120;

  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
    return $this;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
    return $this;
  }

  public function getTaille(){
    return $this->taille;
  }

  public function setTaille($taille){
    $this->taille=$taille;
    return $this;
  }

}

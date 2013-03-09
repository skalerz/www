<?php

class Controller {
  
  private $page = null; // Je déclare une nouvelle variable pour mon controleur. De sorte que je n'ai plus a la passer en argument, elle sera automatiquement disponible dans toutes les fonctions de mon instance de classe
  
  public function process(){

    // Sur quelle page sommes-nous ?
    $this->page = isset($_GET['page'])?trim($_GET['page']):"error";
    
    // Vérifie l'utilisateur
    $user = $this->checkUserName($_GET['name']);
    $params = array("user" => $user);
    if (!is_null($user)){
      switch ($this->page) {
        case 'home':
          $this->processHome();
          break;
        case 'contact':
          $this->processContact();
          break;      
        default:
          $this->processError();
          break;
      }
    }

    else {
      $this->processError();
    }
   
    $this->render($params); // J'ai enlevé page, car c'est une propriété de l'objet maintenant

  }

  private function checkUserName($username){ // pas besoin d'etre publique ...

    $user = null;
  
    if ("Ben" === $username || "Cyril" === $username) { // la triple égalité est toujours préférable
      $user = new User();
      $user->setName($username)->setEmail("myAss@" . strtolower($user->getName()) . ".com"); // Grace au fait que les fonctions setXX() retournent l'objet, on peut chainer les appels
    }
    
    return $user; 
  }


  private function processHome(){
            
    return ;

  }

  private function processContact(){
    
    return ;

  }

  private function processError(){
    $this->page="error";

    return ;

  }

  private function render($params)
  {

    ob_start();
    include('vue/' . $this->page . '.php' );
    $content = ob_get_contents();
    ob_end_clean();

    echo $content;

  }

}

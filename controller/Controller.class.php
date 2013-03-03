<?php

class Controller {
  
  public function process(){

    $page = $_GET['page'];
    $name = $_GET['name'];

    $check=$this->checkUserName($name);
    $params=array("user" => $check["user"]);

    if (1 == $check["ok"]){
      switch ($page) {
        case 'home':
          $this->processHome();
          break;
        case 'contact':
          $this->processContact();
          break;      
        default:
          $page = 'error';
          $this->processError();
          break;
      }
    }

    else {
      $page="error";
      $this->processError();
    }
    
    $this->render($page, $params);

  }

  public function checkUserName($username){
    
    $isOk=0;
    $user = new User();
    if ("Ben" == $username || "Cyril" == $username) {
      $isOk=1;
      $user->setName($username);
      $user->setEmail("myAss@" . $user->getName() . ".com");
    }
    
    return array("user" => $user, "ok" => $isOk);
  }


  public function processHome(){
            
    return ;

  }

  public function processContact(){
    
    return ;

  }

  public function processError(){

    return ;

  }

  public function render($page, $params)
  {

    ob_start();
    include('vue/' . $page . '.php' );
    $content = ob_get_contents();
    ob_end_clean();

    echo $content;

  }

}

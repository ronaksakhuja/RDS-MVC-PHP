<?php


/*
 * App Core Class
 * creates URL and loads core controller
 * URL FORMAT - /controller/method/params
 */

 class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url=$this->getUrl();
       //look for controllers for first value
       if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
           //set it as the current controller
           $this->currentController=ucwords($url[0]);
           unset($url[0]);
       }
           //require the controller

           require_once '../app/controllers/'.$this->currentController.
           '.php';
            //instantiaite controller classs MUCH WOW!!!!
           $this->currentController =new $this->currentController;

           //check for method of url
           if(isset($url[1])){
               //check to see if method exists in controller
               if(method_exists($this->currentController,$url[1])){
                   //oh yea it's present bro!
                   $this->currentMethod=$url[1];
               }
           }
           unset($url[1]);
          //get params

          $this->params=$url ? array_values($url) : [];

          //call a callback with array of params

          call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
        
    }

    public function getUrl(){
        
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode('/',$url);
            return $url;
        }
    }

}

?>
 

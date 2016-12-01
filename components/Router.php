<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author rodnoy
 */
class Router {
    private $routes;
    
    public function __construct(){
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    /**
     * Returns request string
     * @return string
     */
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
            //return substr($_SERVER['REQUEST_URI'], strlen('/phpstartmvc/'));
        }
    }
    
    public function run(){
        //получить строку запроса
        $uri = $this->getURI();
        //проверить наличие такого запроса в routes.php
        foreach($this->routes as $uriPattern => $path){
                    
            //сравним $uriPattern и $uri
            if(preg_match("~$uriPattern~",$uri)){
               //если есть совпадение, определить какой контроллер
               //и action обрабатывают запрос 
               $segments = explode('/',$path);
               $controllerName = array_shift($segments).'Controller';
               $controllerName = ucfirst($controllerName);
               
               $actionName = 'action'.ucfirst(array_shift($segments));
               echo $controllerName;
               echo "<br>$actionName";
               
               //подключить файл класс-контроллера
               $controllerFile = ROOT.'/controllers/'.
                       $controllerName.'.php';
               
               if(file_exists($controllerFile)){
                   include_once($controllerFile);
               }
               
               //создать обьект, вызвать метод (т.е. action)
               $controllerObject = new $controllerFile;
               $result = $controllerObject->$actionName();
               if($result != null){
                   break;
               }
            }
        }
        
        
        
        
        
    }
    
}

<?php

class Application{

    public static function process(){
        //session_start();
        $controllerName = "Entreprise";
        $task = "login";

        if(!empty($_GET['controller'])){
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])){
            $task = ucfirst($_GET['task']);
        }

        $controllerName = "\Controllers\\".$controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}